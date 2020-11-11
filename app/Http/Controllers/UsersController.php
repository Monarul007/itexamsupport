<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceTypes;
use App\User;
Use Session;

class UsersController extends Controller
{
    public function memberRegister(){
        $services = ServiceTypes::get();
        return view('/member_register')->with(compact('services'));
    }
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $userCheck = User::where('email',$data['InputEmail'])->count();
            if($userCheck>0){
                return redirect()->back()->with('flash_message_error', 'Email Address Already Exists!');
            }else{
                $user = new User;
                $user->name = $data['InputName'];
                $user->email = $data['InputEmail'];
                $user->user_type = 2;
                $user->contact_no = $data['InputPhone'];
                $user->company_name = $data['InputCompany'];
                $user->designation = $data['InputDesignation'];
                $user->location = $data['InputLocation'];
                $user->whatsapp = $data['InputSocial'];
                $user->service_type_id = $data['InputStype'];
                $user->vendor_exam = $data['InputTitle'];
                $user->exam_code = $data['InputEcode'];
                // $user->exam_title = $data['InputTitle'];
                $user->password = bcrypt($data['InputPassword']);
                $user->save();

                return redirect()->back()->with('flash_message_success', 'Registered Successfully!');
            }
        }
    }
}
