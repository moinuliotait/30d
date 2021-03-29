<?php

namespace App\Http\Controllers;

use App\Repositories\PaymentHistory\PaymentHistoryRepositoryInterface;
use Illuminate\Http\Request;

class MollePaymentController extends Controller
{

    public function __construct(PaymentHistoryRepositoryInterface $paymentHistoryRepository)
    {
        $this->model = $paymentHistoryRepository;
    }

    public function test(Request $request)
    {
        try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey(env('MOLLIE_KEY'));

            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => (string)$request->value // You must send the correct number of decimals, thus we enforce the use of strings
                ],

                "description" => "Order #12345",
                "method" => 'ideal',
                "redirectUrl" => "https://30dapp.nl/api/mollie-success",
                "webhookUrl" => "https://30dapp.nl/api/mollie-webhook",
                "metadata" => [
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "email" => $request->email,
                    "zakat" => $request->zakat,
                    "sadaqah" => $request->sadaqah,
                    "riba" => $request->riba,
                ],
            ]);
            return ['status' => true, 'redirect_url' => $payment->getCheckoutUrl()];
        } catch (\Exception $e) {
            return ['status' => 0, 'message' => 'something went wrong try again letter', 'error' => "Ideal Methode not active"];
        }
    }

    public function webHook(Request $request)
    {
        $payment = $request->input('id');
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(env('MOLLIE_KEY'));
        $pay = $mollie->payments->get($payment);
        if ($pay->isPaid()) {
            try {
                $meta = json_decode(json_encode($pay->metadata));
                $data = [
                    'first_name' => $meta->first_name,
                    'last_name' => $meta->last_name,
                    'email' => $meta->email,
                    'zakat' => $meta->zakat,
                    'sadaqah' => $meta->sadaqah,
                    'riba' => $meta->riba
                ];
                $result = $this->model->createPayment($data);
                return ['status' => 1, 'data' => 'Payment successfully done.'];
            } catch (\Exception $e) {
                return ['status' => 0, 'message' => 'something went wrong try again letter'];
            }
        }
    }

    public function success(Request $request)
    {

        return ['status' => true, 'message' => 'complete'];
    }
}
