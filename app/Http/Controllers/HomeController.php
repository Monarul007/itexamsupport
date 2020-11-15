<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->user_type == '1'){
                return view('admin.index');
            }elseif(Auth::user()->type == '2'){
                return redirect('myaccount');
            }else{
                return redirect('login_register');
            }
        }
    }
}
