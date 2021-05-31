<?php

namespace App\Http\Controllers;

use App\Jobs\SendApplicationEditMail;
use App\Jobs\SendApplicationFeeInvoiceMail;
use App\Jobs\SendWelcomeMail;
use App\Models\Application;
use App\Models\ApplicationVerificationCode;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Razorpay\Api\Api;

class FrontApplicationController extends Controller
{
    public function apply(Request $request)
    {
        $validations = [
            'photo' => 'required|image|max:1024',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => '',
            'dob' => 'required|date',
            'age' => '',
            'name_of_guardian' => 'required',
            'relationship_with_guardian' => '',
            'email' => 'required|email|unique:applications,email',
            'address_line1' => 'required',
            'address_line2' => '',
            'post' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address_in_india' => '',
            'phone' => 'required',
            'phone2' => '',
            'whatsapp_number' => '',
            'time_preference' => 'required',
            'learnt_malayalam_before' => 'required',
            'know_about_aksharam' => ''
        ];

        // Make validation
        $request->validate($validations);

        $data = $request->except('photo');

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photo = $request->file('photo');

            $filename = $photo->store('applications/photos');

            $data['photo'] = $filename;
        }

        $application = Application::create($data);

        session(['application' => $application]);
        
        SendWelcomeMail::dispatch($application);

        return Redirect::route('aksharam.payment');
    }

    public function proccessPayment(Request $request)
    {
        $application = session('application');

        if(!$application) {
            return Redirect::route('aksharam.apply')->withErrors(['error' => 'Fill the form first']);
        }

        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment_id = $input['razorpay_payment_id'];
        $payment = $api->payment->fetch($payment_id);


        if(count($input) && !empty($payment_id)) {
            if($application->hasAdmissionFee()) {
                $app_payment = $application->admissionFee();

                if($app_payment->status == 1) {
                    return Redirect::route('aksharam.payment.success');
                }
            } else {
                $app_payment = $application->payments()->create([
                    'amount' => $payment['amount'],
                    'currency' => $payment['currency'],
                    'transaction_id' => $payment['id'],
                    'order_id' => $payment['order_id']
                ]);
            }

            
            try {
                $response = $api->payment->fetch($payment_id)->capture([
                    'amount' => $payment['amount'],
                    'currency' => $payment['currency'],
                ]);

                $app_payment->status = 1;
                $app_payment->save();

                session()->forget('application');

                SendApplicationFeeInvoiceMail::dispatch($app_payment);

            } catch (\Exception $e) {
                return Redirect::route('aksharam.payment.failed')->withErrors(['error' => $e->getMessage()]);
            }
            
            
            return Redirect::route('aksharam.payment.success', ['application' => $application]);
        }
        
    }

    public function getVerification()
    {
        return view('website.getverification');
    }

    public function sendVerificationCode(Request $request)
    {
        $application = Application::where('email', $request->email)->first();

        if($application) {
            SendApplicationEditMail::dispatch($application);
        } else {
            return Redirect::back()->withErrors(['error' => 'Application with the provided email was not found!']);
        }

        return Redirect::route('aksharam.application.verify', ['application' => $application]);

    }

    public function getVerifyCode(Request $request)
    {
        if(!$request->get('application')) {
            return Redirect::route('aksharam.application.requestcode')->withErrors(['error' => 'Application not found. Try again']);
        }

        $application = Application::findOrFail($request->get('application'));

        return view('website.verifycode', compact('application'));
    }

    public function verifyCode(Request $request)
    {
        $code = $request->get('code');
        $vcode = ApplicationVerificationCode::where('code', $code)->first();

        if(!$code || !$vcode) {
            return Redirect::route('aksharam.application.requestcode')->withErrors(['error' => 'Invalid code was provided']);
        } elseif($request->get('application_id') != $vcode->application_id) {
            return Redirect::route('aksharam.application.requestcode')->withErrors(['error' => 'Wrong verification code was provided']);
        }

        return Redirect::route('aksharam.application.edit', ['code' => $vcode->code]);
    }

    public function edit(Request $request)
    {
        $code = ApplicationVerificationCode::where(['code' => $request->get('code'), 'status' => 1])->first();

        if(!$request->get('code') || !$code) {
            return Redirect::route('aksharam.application.requestcode')->withErrors(['error' => 'Invalid code was provided.']);
        }

        $application = $code->application;

        return view('website.application.edit', ['application' => $application]);
    }
    
    public function update(Request $request, Application $application)
    {
        $validations = [
            'photo' => '',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => '',
            'dob' => 'required|date',
            'age' => '',
            'name_of_guardian' => 'required',
            'relationship_with_guardian' => '',
            'email' => 'required|email|unique:applications,email,' . $application->id,
            'address_line1' => 'required',
            'address_line2' => '',
            'post' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address_in_india' => '',
            'phone' => 'required',
            'phone2' => '',
            'whatsapp_number' => '',
            'time_preference' => 'required',
            'learnt_malayalam_before' => 'required',
            'know_about_aksharam' => ''
        ];

        if(!$application->hasPhoto()) {
            $validations['photo'] = 'required|image|max:1024';
        }

        $request->validate($validations);

        $data = $request->except('photo');

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photo = $request->file('photo');

            $filename = $photo->store('applications/photos');

            $data['photo'] = $filename;

            if($application->hasPhoto()){
                Storage::delete($application->photo);
            }
        }

        $application->update($data);

        $application->codes()->each(function($code){
            $code->status = 0;
            $code->save();
        });

        return Redirect::route('aksharam.apply')->with('success', 'The application was updated!');
    }

    public function invoice(Request $request, $payment_id)
    {
        if(!$payment_id) {
            return Redirect::back();
        }

        $payment = Payment::findOrFail($payment_id);

        return $payment->getInvoice();
    }
}
