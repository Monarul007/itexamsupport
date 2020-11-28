<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderItem;
use Session;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('checkout');
    }

    public function placeOrder(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'phone_number' => 'required'
        ]);
        $data = $request->all();
        $total = 0;
        $tqnt = 0;
        if(session('cart')){
            foreach(session('cart') as $id => $details){
                $total += $details['price'] * $details['quantity'];
            }
        }
        if(session('cart')){
            foreach(session('cart') as $id => $details){
                $tqnt = $tqnt + $details['quantity'];
            }
        }

        if($request->isMethod('post')){
            $order = new Order; 
            
            $order->order_number = 'ORD-'.strtoupper(uniqid());
            $order->user_id = auth()->user()->id;
            $order->status = 'pending';
            $order->grand_total = $total;
            $order->item_count = $tqnt;
            $order->payment_status = 0;
            $order->payment_method = null;
            $order->first_name = $data['first_name'];
            $order->last_name = $data['last_name'];
            $order->address = $data['address'];
            $order->city = $data['city'];
            $order->country = $data['country'];
            $order->post_code = $data['post_code'];
            $order->phone_number = $data['phone_number'];
            $order->notes = $data['notes'];
            Session::put('order_number',$order->order_number);
            $order->save();
        }

        if(session('cart')) {
            $items = session('cart');
            foreach($items as $id => $details){
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $details['name'])->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $details['quantity'],
                    'price'         =>  $details['price']
                ]);

                $order->items()->save($orderItem);
            }
        }

        Session::forget('cart');

        // return $order;
        return redirect('invoice');
    }

    public function invoice(){
        $order_number = Session::get('order_number');
        $order = DB::table('orders')->where('order_number', $order_number)->first();
        $order_id = $order->id;
        $order_details = OrderItem::where('order_id', $order_id)->get();
        return view('invoice')->with(compact('order','order_details'));
    }
}
