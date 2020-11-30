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
        $tx_id = $shurjopay_service->generateTxId('NOK'. uniqid()); // Get transaction id. You can use custom id like: $shurjopay_service->generateTxId('123456');
        // $upOrder = Order::find($order_id);
        // $upOrder->update([
        //     'transaction_id' => $tx_id,
        //     'payment_status' => 2,
        //     'status' => "processing",
        //     'payment_method	' => "ShurjoPay"
        // ]);

        $success_route = route('success'); // optional.
        $shurjopay_service->sendPayment($amount, $success_route); // You can call simply $shurjopay_service->sendPayment(2) without success route
    }

    public function success(){
        return view('success');
    }
}
