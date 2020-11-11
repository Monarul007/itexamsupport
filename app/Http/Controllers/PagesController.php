<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

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

    public function products(){
        return view('products');
    }

    public function certification(){
        return view('certifications');
    }

    public function exam($id){
        return view('single-exam');
    }

    //Admin Pages
    public function vendors(){
        return view('admin.vendors.all-vendors');
    }
    public function certifications(){
        return view('admin.certifications.all-certifications');
    }
    public function exams(){
        return view('admin.exams.all-exams');
    }
}
