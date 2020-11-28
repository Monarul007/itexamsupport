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
            <h4 style="color:#333399;background: #f5f5f5;padding: 10px;font-size: 16px;font-weight: bold;border: 1px solid #e5e5e5;margin-bottom: 10px;margin-top: 0;text-transform: uppercase;">{{$vv->name}}</h4>
            <h4 style="color:#333399;background: #f5f5f5;padding: 10px;font-size: 16px;font-weight: bold;border: 1px solid #e5e5e5;margin-bottom: 10px;margin-top: 0;text-transform: uppercase; text-align: center;">Complete list of {{$vv->name}} certifications and exams available.</h4>
            <div class="row mt-2 mb-5">
                <div class="col-12">
                    @foreach($certifications as $c)
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-sm">
                                <thead class="text-white text-center">
                                    <tr>
                                        <th>Certification</th>
                                        <th>Exam</th>
                                        <th>Title</th>
                                        <th>No. of Q&A</th>
                                        <th>Last Updated</th>
                                    </tr>
                                    <tr>
                                        <td height="50" align="center" colspan="5" style="border-bottom: 1px solid #d0dde6;font-size: 14px;color: #164ea5;background: #fff;vertical-align: middle;"><strong>{{$c->title}}</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($c->exams->count() > 0)
                                        @foreach($c->exams as $exam)
                                        <tr>
                                            <td class="text-center">{{$exam->certification->title}}</td>
                                            <td class="text-center"><a href="/exam/{{$exam->id}}">{{$exam->exam_code}}</a></td>
                                            <td class="text-center">{{$exam->exam_title}}</td>
                                            <td class="text-center">{{$exam->total_questions}}</td>
                                            <td class="text-center">{{($exam->updated_at->format('j F, Y'))}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td height="30" width="750" colspan="5"><i class="fa fa-arrow-up"></i><a href="#top"> Top</a></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center text-danger">No exams available to display under this vendor!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection