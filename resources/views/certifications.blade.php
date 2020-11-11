@extends('layouts.header')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <img src="images/black.jpeg" alt="Trulli" style="width: 100%" height="333">
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
            <div class="row mt-5 mb-5">  
                    <div class="col-md-12">
                        <table id="myTable" class="table table-sm">
                        <tr class="header">
                            <th style="width:60%;">Cisco</th>
                        </tr>
                        <tr>
                            <td>CCNP Routing and Switching</td>
                            
                        </tr>
                        <tr>
                            <td>Cisco CCIE Security Exams</td>
                            
                        </tr>
                        <tr>
                            <td>CCNA</td>
                        
                        </tr>
                        <tr>
                            <td>CCNP</td>
                            
                        </tr>
                        <tr>
                            <td>CCNA Security</td>
                            
                        </tr>
                        <tr>
                            <td>CCNA Cloud</td>
                        
                        </tr>       
                        </table>
                        </div>
                        </div>
                        </div>
                    </div>
            </div>
<style>

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
        padding: 6px;
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