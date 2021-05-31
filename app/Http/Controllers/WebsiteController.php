<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function exploreFeatures()
    {
        return view('website.features');
    }
    
    public function apply()
    {
        $application = session('application');

        return view('website.apply', ['application' => $application]);
    }

    public function payment()
    {
        if(!session('application')) {
            return Redirect::route('aksharam.payment.manual');
        }

        $application = session('application');

        if($application->hasAdmissionFee(1)) {
            return Redirect::route('aksharam.payment.success', ['application' => $application]);
        }

        return view('website.payment', ['application' => $application]);
    }

    public function payment_manual(Request $request)
    {
        if($request->has('email') && $request->get('email')) {
            $application = Application::where('email', $request->get('email'))->first();

            if(!$application) {
                return Redirect::back()->withErrors(['error' => "The application can't be found"]);
            }

            session(['application' => $application]);
            
            return Redirect::route('aksharam.payment');
        }

        return view('website.payment.manual');
    }

    public function success(Request $request)
    {
        if(!$request->get('application')) {
            return Redirect::route('aksharam.apply', ['source' => 'success'])->withErrors(['error' => 'Fill the application form first']);
        }
        
        $application = Application::findOrFail($request->get('application'));

        if(!$application->payments()->exists() || !$application->admissionFee(1)) {
            session(['application' => $application]);
            return Redirect::route('aksharam.payment')->withErrors(['error' => 'Please make the payment first']);
        }

        return view('website.payment.success', ['application' => $application]);
    }
    
    public function failed()
    {
        if(!session('application')) {
            return Redirect::route('aksharam.apply', ['source' => 'success'])->withErrors(['error' => 'Fill the application form first']);
        }

        $application = session('application');

        if(!$application->payments()->exists()) {
            return Redirect::route('aksharam.payment')->withErrors(['error' => 'Please make the payment first']);
        }

        return view('website.payment.failed', ['application' => session('application')]);
    }

    public function about()
    {
        return view('website.pages.about');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }
   
    public function privacy_policy()
    {
        return view('website.pages.privacy_policy');
    }
    
    public function terms_of_service()
    {
        return view('website.pages.terms_of_service');
    }
    
    public function refund_policy()
    {
        return view('website.pages.refund_policy');
    }
}
