@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3 pr-0">
            <div class="card mb-3">
                <div class="card-body pt-0 m-2">
                @guest
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="form-check">
                                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('SIGN IN') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            
                        </div>
                    </form>
                    @else
                    <div class="row"><span class="small"><b>Welcome {{ Auth::user()->name }}</b></span></div>
                    <div class="row"><p class="small">You have No Product in your Member's Area of ITExam Support.</p></div>
                    <div class="row">
                    <a class="btn btn-primary btn-sm" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                @endguest
                </div>
            </div>
            <table id="myTable" class="table table-sm">
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
                <img src="/images/black.jpeg" alt="ITExam Support" style="width: 100%" height="333">
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
            @if ($error = Session::get('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $error }}</strong>
            </div>
            @endif
            @if ($success = Session::get('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $success }}</strong>
                </div>
            @endif
            <div class="mt-4">          
                <table class="table table-bordered table-sm">
                    <tbody>
                    <tr>
                        <th scope="row" style="min-width:200px;">Vendor</th>
                        <td>{{$exam->vendor->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Certification</th>
                        <td>{{$exam->certification->title}}</td>               
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Exam Code</th>
                        <td>{{$exam->exam_code}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Exam Title</th>
                        <td>{{$exam->exam_title}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">No. of Questions</th>
                        <td>{{$exam->total_questions}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Last Updated</th>
                        <td>{{($exam->updated_at->format('j F, Y'))}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Product Type</th>
                        <td>Q & A With Explanation</td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Question & Answers</th>
                        <td><a href="/" class="btn btn-primary btn-sm">Download</a></td>
                    </tr>
                    <tr>
                        <th scope="row" style="min-width:200px;">Price</th>
                        <td class="m-auto"> <b>BDT {{$exam->price}}</b>
                        <form action="{{url('add-cart')}}" method="post" name="addCartForm" id="addCartForm" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="exam_id" value="{{$exam->id}}">
                            <input type="hidden" name="inputPrice" value="{{$exam->price}}">
                            <button type="submit" class="btn btn-warning btn-sm">Add to cart</button>
                        </form>
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
    </div>
</div>
@endsection