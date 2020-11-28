@extends('layouts.app')
@section('title', 'Cart')
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
            <h4 style="color:#333399;background: #f5f5f5;padding: 10px;font-size: 16px;font-weight: bold;border: 1px solid #e5e5e5; margin-bottom: 10px;margin-top: 0;text-transform: uppercase;">Your Cart</h4>
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
                <div class="col-12 mt-3">
                    <div class="table-responsive">
                        <table id="cart" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th style="width:10%;">Quantity</th>
                                    <th class="text-center">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0 ?>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h6 class="nomargin">{{ $details['name'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">BDT{{ $details['price'] }}</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">BDT {{ $details['price'] * $details['quantity'] }}</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                                <tr class="visible-xs">
                                    <td colspan="5"class="text-center"><strong>Total {{ $total }}</strong></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                    <td colspan="4" class="hidden-xs text-center"><a href="{{ route('checkout.index') }}" class="btn btn-info"><i class="fa fa-angle-right"></i> Proceed to checkout</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                    window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection