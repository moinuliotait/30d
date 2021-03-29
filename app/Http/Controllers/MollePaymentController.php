<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MollePaymentController extends Controller
{

    public function test( Request $request)
    {
//        dd(env('MOLLIE_KEY'));
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Sj9AkaS48T2yqsBT7PEShzrk6pgwWR");

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
            ],

            "description" => "Order #12345",
            "redirectUrl" => "https://webshop.example.org/order/12345/",
            "webhookUrl" => "https://webshop.example.org/payments/webhook/",
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);
        return json_encode($payment);
    }

    public function webHook(Request $request)
    {
        $payment = $request->input('id');
        $mollie = new \Mollie\Api\MollieApiClient();
        $pay = $mollie->payments->get($payment);

        return json_encode($pay);
    }
}
