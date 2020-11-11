<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Session;

class VendorsController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $vendor = new Vendor;
            $vendor->name = $data['VendorName'];
            $vendor->description = $data['VendorDesc'];
            $vendor->type = $data['VendorType'];
            $vendor->save();

            return redirect()->route('admin.create.vendor')->with('flash_message_success', 'Vendor Created Successfully!');
        }
        return view('admin.vendors.create-vendor');
    }

}
