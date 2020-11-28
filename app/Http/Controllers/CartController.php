<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function addCart(Request $request){

        $data = $request->all();
        
        $user = Auth::id();
        if(empty($data['user_email'])){
            $userEmail = '';
        }
        if(empty($user)){
            $user = '';
        }
        if(empty($userEmail)){
            $userEmail = '';
        }
        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
        }

        if(!empty($data['exam_id'])){
            $countItem = Cart::select('exam_id')->where('session_id', $session_id)->count();
            if($countItem>0){
                return redirect()->back()->with('flash_message_error', 'This exam already added to cart! Try adding another.');
            }else{
                Cart::create(['exam_id'=>$data['exam_id'],'dump_id'=>null,'voucher_id'=>null,'price'=>$data['inputPrice'],'quantity'=>1,'user_id'=>$user,'user_email'=>$userEmail,'session_id'=>$session_id]);
            }
        }else if(!empty($data['dump_id'])){
            $countItem = Cart::select('dump_id')->where('session_id', $session_id)->count();
            if($countItem>0){
                return redirect()->back()->with('flash_message_error', 'This dump already added to cart! Try adding another.');
            }else{
                Cart::create(['dump_id'=>$data['dump_id'],'exam_id'=>$data['exam_id'],'voucher_id'=>$data['voucher_id'],'price'=>$data['inputPrice'],'quantity'=>1,'user_id'=>$user,'user_email'=>$userEmail,'session_id'=>$session_id]);
            }
        }else if(!empty($data['voucher_id'])){
            $countItem = Cart::select('voucher_id')->where('session_id', $session_id)->count();
            if($countItem>0){
                return redirect()->back()->with('flash_message_error', 'This voucher already added to cart! Try adding another.');
            }else{
                Cart::create(['voucher_id'=>$data['voucher_id'],'dump_id'=>$data['dump_id'],'exam_id'=>$data['exam_id'],'price'=>$data['inputPrice'],'quantity'=>1,'user_id'=>$user,'user_email'=>$userEmail,'session_id'=>$session_id]);
            }
        }

        return redirect()->back()->with('flash_message_success', 'Product added to cart successfully!');
    }
    public function cart(){
        return view('cart');
    }

    public function addToCart($id){
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "discount" => $product->discount,
                    "code" => $product->code
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('flash_message_success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('flash_message_success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "discount" => $product->discount,
            "code" => $product->co
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('flash_message_success', 'Product added to cart successfully!');
    }

    public function update(Request $request){
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('flash_message_success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('flash_message_success', 'Product removed successfully');
        }
    }
}
