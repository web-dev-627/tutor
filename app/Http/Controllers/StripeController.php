<?php

namespace App\Http\Controllers;
use Session;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('pages.stripe');    
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(config('stripe.STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => ($request->amount)*100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => $request->name,
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}
