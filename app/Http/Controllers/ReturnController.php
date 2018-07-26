<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReturnController extends Controller
{
    public function payFine(Request $request)
    {
        $temp = 0;
        $order_id = 0;
        $price = $request->fine;
        $date = date("ymdHms");
        $transaction = array(
            "order_id" => "Order" . "-" . $order_id . $date,
            "gross_amount" => $price
        );

//        dd($price);
        $body = array(
            "transaction_details" => $transaction
        );

        $headers = array(
            'Authorization' => 'Basic U0ItTWlkLXNlcnZlci1ETS1ZX2VnalNQTDQ1Z29MTUFZVGczSVQ6Og==',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app.sandbox.midtrans.com/snap/v1/transactions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic U0ItTWlkLXNlcnZlci1ETS1ZX2VnalNQTDQ1Z29MTUFZVGczSVQ6Og==",
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 0ebfe712-65e0-fe37-b632-60161c922d01"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response);


        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            Order::where('id', $request->order_id)
                ->update([
                    'status' => 5,
                ]);
            return Redirect::to($json->redirect_url);
        }


    }
}
