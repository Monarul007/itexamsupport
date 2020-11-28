@extends('layouts.app')
@section('title', 'Single Product')
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
            <h4 style="color:#333399;background: #f5f5f5;padding: 10px;font-size: 16px;font-weight: bold;border: 1px solid #e5e5e5; margin-bottom: 10px;margin-top: 0;text-transform: uppercase;">{{$details->name}}</h4>
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
            <div class="row">
                <div class="col-md-4">
                    @if($details->image) 
                        @foreach(json_decode($details->image) as $item)
                            <img src="{{ asset('storage/'.$item.'')}}" alt="" style="width:100%;">
                        @endforeach
                    @else 
                        <img src="/images/cat-thumb-320x320.png" alt="" style="width:100%;">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-details-price">BDT {{$details->price}} <span style="font-size: 15px; color: #b1b0b0; text-decoration: line-through; margin-left: 10px; display: inline-block;">@if($details->discount) BDT {{$details->price + $details->discount}} @endif</span></div>
                            <p>{{ $details->description }}</p>
                            <a href="{{ url('add-to-cart/'.$details->id) }}" class="btn btn-warning btn-sm">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <p><strong>Code: </strong>{{ $details->code }}</p>
                            <p>{{ $details->specification }}</p>
                            <p>{{ $details->features }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection