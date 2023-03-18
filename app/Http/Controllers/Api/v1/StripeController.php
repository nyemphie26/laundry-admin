<?php

namespace App\Http\Controllers\Api\v1;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;
use Stripe\Price;
use Stripe\Product;

class StripeController extends Controller
{
    public function paymentIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
        ]);
        return response()->json(['paymentIntentId' => $paymentIntent->id]);
    }
    
    public function checkoutPage(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $product = Product::create([
            'name' => $request->name
        ]);

        $price = Price::create([
            'unit_amount' => $request->amount,
            'currency' => $request->currency,
            'product' => $product->id
        ]);

        $checkoutSession = Session::create([
            'line_items' => [[
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                'price' => $price->id,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe-success'),
            'cancel_url' => route('stripe-cancel'),
        ]);
        return response()->json(['sessionId' => $checkoutSession->id, 'url' => $checkoutSession->url]);
    }

    public function retrieveCheckout(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $checkoutSession = Session::retrieve($request->session);
        return response()->json(['status' => $checkoutSession->status, 'payment_status' => $checkoutSession->payment_status]);
    }

    public function paymentMethod(Request $request)
    {
        
        try {
            //code...
            Stripe::setApiKey(config('services.stripe.secret'));
            $intentID = $request->input('paymentIntentID');
            $cardNumber = $request->input('cardNo');
            $expMonth = $request->input('expMonth');
            $expYear = $request->input('expYear');
            $cvc = $request->input('cvc');
    
            $paymentMethod  = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => $cardNumber,
                    'exp_month' => $expMonth,
                    'exp_year' => $expYear,
                    'cvc' => $cvc,
                    ],
            ]);
    
            $paymentIntent = PaymentIntent::retrieve($intentID);
            $paymentIntent->update($intentID,['payment_method' => $paymentMethod->id]);
            $paymentIntent->confirm();
            
            return response()->json(['status' => $paymentIntent->status, 'next_action' => $paymentIntent->next_action]);
        } catch (\Stripe\Exception\CardException $e) {
            //throw $th;
            return response()->json(['status' => $e->getError()->type, 'message' => $e->getError()->message], $e->getHttpStatus());
        }
    }
    
    public function confirmPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $intentID = $request->input(['paymentIntentID']);
        $paymentID = $request->input(['paymentMethodID']);

        $intentData = PaymentIntent::retrieve($intentID);
        // $intentData->update($intentID,['payment_method' => $paymentID]);
        $intentData->payment_method = $paymentID;
        $intentData->confirm();

        return response()->json($intentData);
    }

    public function popUp()
    {
        return response()->json(['url'=>route('3d_secure')]);
    }
}
