<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    public function payment(){

        $data = [];
        $data['items'] =[

            [
                'name'  => 'Donate',
                'price' =>  1,
                'desc'  => 'Description',
                'qty'   => 1
            ],

        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:800/payment/success';
        $data['cancel_url'] = 'http://127.0.0.1:800/cancel';
        $data['total'] = 1;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data, true);
        // dd($response);
        return redirect($response['paypal_link']);

    }

    public function cancel(){

        // Cancel Operation
        return response()->json('Payment Cancelled', 402);

    }

    public function success(Request $request){

        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if(in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])){

            // Approve Payment
            return response()->json('Paid Success');
        };

        // Cancel Payment
        return response()->json('Failed Payment', 402);
    }
}
