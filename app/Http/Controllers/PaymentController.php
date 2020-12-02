<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

class PaymentController extends Controller
{
    public function create(Request $request){

        $order_no = $request->order_id;
        // dd($order_id);
        $order_details = Order::where('order_number', $order_no)->first();
        $amount = $order_details->grand_total;
        $order_id = $order_details->id;
        // dd($order_id);
        $shurjopay_service = new ShurjopayService(); //Initiate the object
        $tx_id = $shurjopay_service->generateTxId('NOK'. $order_no); // Get transaction id. You can use custom id like: $shurjopay_service->generateTxId('123456');
        // $upOrder = Order::find($order_id);
        // $upOrder->update([
        //     'transaction_id' => $tx_id,
        //     'payment_status' => 2,
        //     'status' => "processing",
        //     'payment_method	' => "ShurjoPay"
        // ]);

        $success_route = route('success'); // optional.
        $shurjopay_service->sendPayment($amount, $success_route, $order_no); // You can call simply $shurjopay_service->sendPayment(2) without success route
    }

    public function success(Request $request){

        $server_url = config('shurjopay.server_url');
        $response_encrypted = $request->spdata;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://shurjopay.com/merchant/decrypt.php?data=" . $response_encrypted,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            
        ]);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
           
            $data = array();
            $sp_data = simplexml_load_string($response) or die("Error: Cannot create object");
            //print_r($sp_data);exit;
            $data['tx_id'] = $sp_data->txID;
            $data['bank_tx_id'] = $sp_data->bankTxID;
            if(empty($sp_data->txnAmount)){
                $data['amount'] =0;
            }else{
            $data['amount'] = $sp_data->txnAmount;
            }
            
            $data['bank_status'] = $sp_data->bankTxStatus;
            $data['sp_code'] = $sp_data->spCode;
            $data['sp_code_des'] = $sp_data->spCodeDes;
            $data['sp_payment_option'] = $sp_data->paymentOption; 
        }
        if($data['bank_status']=='SUCCESS'){
            $message = "Your payment request was successfull!!!";
        }else{
            $message = "Your payment request was not successful!!!";
        }
        // print_r($data);exit;
        return view('success')->with(compact('data','message'));
    }
}
