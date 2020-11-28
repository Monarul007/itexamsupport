@extends('layouts.app')

@section('content')
<div id="top"></div>
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
            @livewire('vendorfilter')
        </div>
    </div>
</div>
@endsection