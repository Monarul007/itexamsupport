<?php

namespace App\Http\Controllers;

use App\Certification;
use Illuminate\Http\Request;
use App\Vendor;
use App\Exam;
use App\Product;

class PagesController extends Controller
{
    public function index(){
        return view('contactus');
    }

    public function blog(){
        return view('blog-archieve');
    }
    public function carousel(){
        return view('carousel');
    }
    public function singlePost(Request $request){
        return view('single-blog');
    }
    public function adminIndex(){
        return view('admin.index');
    }

    public function categories(){
        return view('admin.categories.categories');
    }
    public function allProducts(){
        return view('admin.products.all-products');
    }

    public function products(){
        return view('products');
    }

    public function singleProduct($id){
        $details = Product::where('id',$id)->first();
        return view('single-product')->with(compact('details'));
    }

    public function certification(){
        return view('certifications');
    }

    public function exam($id){
        $exam = Exam::where('id', $id)->first();
        // dd($exam);
        return view('single-exam')->with(compact('exam'));
    }

    public function vendor($id){
        $vv = Vendor::whereId($id)->first();
        $certifications = Certification::where('vendor_id', $id)->get();
        return view('single-vendor')->with(compact('vv','certifications'));
    }
    //Admin Pages
    public function allvendors(){
        return view('admin.vendors.all-vendors');
    }
    public function certifications(){
        return view('admin.certifications.all-certifications');
    }
    public function exams(){
        return view('admin.exams.all-exams');
    }
    public function vouchers(){
        return view('admin.vouchers.all-vouchers');
    }
}
