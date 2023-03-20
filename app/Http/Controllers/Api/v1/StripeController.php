<?php

namespace App\Http\Controllers\Api\v1;

use Stripe\Stripe;
use App\Models\Variant;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    protected function initStripe()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        return new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
    }
    
    public function checkoutPage(Request $request)
    {
        $stripe = $this->initStripe();
        $product_name = "$request->name's Order ($request->date)";

        try {
            $price = $stripe->prices->create([
                "currency" => $request->currency,
                "unit_amount" => $request->amount,
                "product_data" => ["name" => $product_name,],
            ]);
            $checkoutSession = $stripe->checkout->sessions->create([
                'line_items' => [[
                    'price' => $price->id,
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe-success'),
                'cancel_url' => route('stripe-cancel'),
            ]);
    
            return response()->json(['sessionId' => $checkoutSession->id, 'url' => $checkoutSession->url]);
            //code...
        } catch (\Stripe\Exception\CardException $th) {
            return response()->json(['message' => $th->getError()->message],$th->getHttpStatus());
        }
    }
    
    public function retrieveCheckout(Request $request)
    {
        $stripe = $this->initStripe();
        try {
            $checkoutSession = $stripe->checkout->sessions->retrieve($request->session);
            return response()->json(['status' => $checkoutSession->status, 'payment_status' => $checkoutSession->payment_status]);
        } catch (\Stripe\Exception\CardException $th) {
            return response()->json(['message' => $th->getError()->message],$th->getHttpStatus());
        }
    }

}
