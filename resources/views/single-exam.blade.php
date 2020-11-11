@extends('layouts.header')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <input type="text" id="myInput" placeholder="Search for names.." title="Type in a name">
            <table id="myTable">
                <tr class="header">
                <th style="width:60%;">Top Vendor Included</th>
                </tr>
                <tr>
                <td>Cisco</td>
                
                </tr>
                <tr>
                <td>Microsoft</td>
                
                </tr>
                <tr>
                <td>Amazon</td>
                
                </tr>
                <tr>
                <td>CompTIA</td>
                
                </tr>
                <tr>
                <td>Juniper</td>
                
                </tr>
                <tr>
                <td>VMware</td>
            
                </tr>
                <tr>
                <td>Oracle</td>
                
                </tr>
                <tr>
                <td>PMP</td>
                
                </tr>
                <tr>
                <td>RedHat</td>
                
                </tr>
                <tr>
                <td>ITIL</td>
                
                </tr>
                <tr>
                <td>ECCouncil</td>
                
                </tr>
                <tr class="footer">
                <th style="width:60%;">View All Vendors</th>
            
                </tr>
            </table>
        </div>
        <div class="col-md-9">
            <h4 style="color:#333399;background: #f5f5f5;padding: 10px;font-size: 16px;font-weight: bold;border: 1px solid #e5e5e5;margin-bottom: 10px;margin-top: 0;text-transform: uppercase;">Unlimited Life Time Access Pack</h4>
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
                        <td>3COM</td>
                    </tr>
                    <tr>
                        <th scope="row">Certification</th>
                        <td>CIPTS</td>               
                    </tr>
                    <tr>
                        <th scope="row">Exam Code</th>
                        <td>3M0-212</td>
                    </tr>
                    <tr>
                        <th scope="row">Exam Title</th>
                        <td>3Com Certified Enterprise LAN Specialist Final Exam v3.2</td>
                    </tr>
                    <tr>
                        <th scope="row">No. of Questions</th>
                        <td>134</td>
                    </tr>
                    <tr>
                        <th scope="row">Last Updated</th>
                        <td>04/03/2019</td>
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
                        <td>	$25 - Unlimited Access Immediate Access Included
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
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
<style>
  img {
  float: left;
    }
    * {
    box-sizing: border-box;
    position: left;
    }

    #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 5px 5px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #eef5f9 ;
    margin-bottom: 12px;
    }

    #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #eef5f9 ;
    font-size: 18px;
    }

    #myTable th, #myTable td {
    text-align: left;
    padding: 12px;
    }

    #myTable tr {
    border-bottom: 1px solid #eef5f9 ;
    }

    #myTable tr.header, #myTable tr:hover {
    background-color: #eef5f9 ;
    }

    #myTable tr.footer, #myTable tr:hover {
    background-color: #eef5f9 ;
    }
</style>
@endsection