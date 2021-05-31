<?php

namespace App\Http\Controllers;

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
            return Redirect::route('aksharam.apply')->withErrors(['error' => 'Fill the application form first']);
        }

        return view('website.payment', ['application' => session('application')]);
    }

    public function success()
    {
        if(!session('application')) {
            return Redirect::route('aksharam.apply')->withErrors(['error' => 'Fill the application form first']);
        }
        
        $application = session('application');

        if(!$application->payments()->exists()) {
            return Redirect::route('aksharam.payment')->withErrors(['error' => 'Please make the payment first']);
        }

        return view('website.payment.success', ['application' => session('application')]);
    }
    
    public function failed()
    {
        if(!session('application')) {
            return Redirect::route('aksharam.apply')->withErrors(['error' => 'Fill the application form first']);
        }

        $application = session('application');

        if(!$application->payments()->exists()) {
            return Redirect::route('aksharam.payment')->withErrors(['error' => 'Please make the payment first']);
        }

        return view('website.payment.failed', ['application' => session('application')]);
    }
}
