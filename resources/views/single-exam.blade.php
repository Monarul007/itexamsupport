@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <input type="text" id="myInput" placeholder="Search for names.." title="Type in a name">
            <table id="myTable">
                <tr class="header">
                    <th style="width:60%;">Top Vendor Included</th>
                </tr>
                @foreach($vendors as $vendor)
                <tr>
                    <td><a href="/vendors/{{$vendor->id}}">{{$vendor->name}}</a></td>
                </tr>
                @endforeach
                <tr class="footer">
                    <th style="width:60%;"><a href="{{ route('all.products') }}">View All Vendors</a></th>
                </tr>
            </table>
        </div>
        <div class="col-md-9">
            <h4 style="color:#333399;background: #f5f5f5;padding: 10px;font-size: 16px;font-weight: bold;border: 1px solid #e5e5e5;margin-bottom: 10px;margin-top: 0;text-transform: uppercase;">{{$exam->exam_title}}</h4>
            <div class="row">
                <div class="col-md-6">
                <img src="/images/black.jpeg" alt="Trulli" style="width: 100%" height="333">
                <hr class="d-sm-none">
                </div>
                <div class="col-md-6">
                    <h5 style="font-weight: 600;">$50 - Unlimited life time access pack included:</h5>
                    <ul id="demotext">
                        <li>Unlimited access to all Q & A, Study Guides, Labs, Audio & tool</li>
                        <li>Testing Engine Included</li>
                        <li>Over 4000+ exams training</li>
                        <li>Instant Downloads</li>
                        <li>Free Unlimited update for life</li>
                        <li>SSL Secure ordering</li>
                        <li>Verified Answers Researched by Industry Experts</li>
                        <li>Hands on all Future added exams and training tools</li>
                        <li> 100% Guaranteed Success on first attempt</li>
                        <li>24/7 Support</li>
                    </ul> 
                <button type="button" class="btn btn-primary">Buy Now</button>
                </div>
            </div>
            <div class="mt-4">          
                <table class="table table-bordered table-sm">
                    <tbody>
                    <tr>
                        <th scope="row" style="min-width:200px;">Vendor</th>
                        <td>{{$exam->vendor->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Certification</th>
                        <td>{{$exam->certification->title}}</td>               
                    </tr>
                    <tr>
                        <th scope="row">Exam Code</th>
                        <td>{{$exam->exam_code}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Exam Title</th>
                        <td>{{$exam->exam_title}}</td>
                    </tr>
                    <tr>
                        <th scope="row">No. of Questions</th>
                        <td>{{$exam->total_questions}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Last Updated</th>
                        <td>{{($exam->updated_at->format('j F, Y'))}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Product Type</th>
                        <td>Q & A With Explanation</td>
                    </tr>
                    <tr>
                        <th scope="row">Question & Answers</th>
                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Online Testing Engine</th>
                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Desktop Testing Engine</th>
                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Android Testing Engine</th>
                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <td> $25 - Unlimited Access Immediate Access Included
                            3M0-212 Exam + Online Testing Engine + Offline Simulator + Android Testing Engine & 4500+ Other Exams<br><br>
                            <button type="button" class="btn btn-primary">Buy Now</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-home" aria-selected="true">Descrption</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-features" role="tab" aria-controls="nav-profile" aria-selected="false">Features</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-extra" role="tab" aria-controls="nav-contact" aria-selected="false">Extra Features</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab"><div class="card-body">{{$exam->description}}</div></div>
                        <div class="tab-pane fade" id="nav-features" role="tabpanel" aria-labelledby="nav-features-tab"><div class="card-body">{{$exam->features}}</div></div>
                        <div class="tab-pane fade" id="nav-extra" role="tabpanel" aria-labelledby="nav-extra-tab"><div class="card-body">
                        {{$exam->extra_features}}
                        </div></div>
                    </div>
                </div>
            </div>
        </div>
@endsection