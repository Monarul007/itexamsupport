
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ITExam Support') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .main-section{
            background-color: #F8F8F8;
        }
        .cart.dropdown{
            float:right;
            padding-right: 30px;
        }
        .cart.dropdown .dropdown-menu{
            padding:20px;
            top:10px !important;
            width:350px !important;
            left:-240px !important;
            box-shadow:0px 5px 30px black;
        }
        .total-header-section{
            border-bottom:1px solid #d2d2d2;
        }
        .total-section p{
            margin-bottom:20px;
        }
        .cart-detail{
            padding:15px 0px;
        }
        .cart-detail-img img{
            width:100%;
            height:100%;
            padding-left:15px;
        }
        .cart-detail-product p{
            margin:0px;
            color:#000;
            font-weight:500;
        }
        .cart-detail .price{
            font-size:12px;
            margin-right:10px;
            font-weight:500;
        }
        .cart-detail .count{
            color:#C2C2DC;
        }
        .checkout{
            border-top:1px solid #d2d2d2;
            padding-top: 15px;
        }
        .checkout .btn-primary{
            border-radius:50px;
            height:40px;
        }
        .dropdown-menu:before{
            content: " ";
            position:absolute;
            top:-20px;
            right:50px;
            border:10px solid transparent;
            border-bottom-color:#fff;
        }
        .thumbnail {
            position: relative;
            padding: 0px;
            margin-bottom: 20px;
        }
        .thumbnail img {
            width: 100%;
        }
        .thumbnail .caption{
            margin: 7px;
        }
        .page {
            margin-top: 50px;
        }
        .btn-holder{
            text-align: center;
        }
        .table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
        }
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control{
                width:20%;
                display: inline !important;
            }
            .actions .btn{
                width:36%;
                margin:1.5em 0;
            }
            .actions .btn-info{
                float:left;
            }
            .actions .btn-danger{
                float:right;
            }
            table#cart thead { display: none; }
            table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
            table#cart tbody tr td:first-child { background: #333; color: #fff; }
            table#cart tbody td:before {
                content: attr(data-th); font-weight: bold;
                display: inline-block; width: 8rem;
            }
            table#cart tfoot td{display:block; }
            table#cart tfoot td .btn{display:block;}
        }
    </style>
    @livewireStyles
</head>
<body>
    <section class="pt-3" id="with-search">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <div class="row m-auto">
                    <div class="col-md-3 pr-0">
                    <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="" width="100px"margin="left"></a>
                    </div>
                    <div class="col-md-9 p-0 m-auto">
                    <h3 style=color:green;>Pass Your IT Certification Exam</h3>
                    <p style=color:green>100% Money Back Garantee</p>
                    </div>
                </div>
                </div>
                <div class="col-md-5 ml-auto mt-4">
                    @livewire('search-dropdown')
                </div>
            </div>
        </div>
    </section>

    <section id="middle-nav">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
            <p style="color:red";>Sign Up now and get discount vouchers</p>
            </div>
            <div class="col-md-8 pb-3 ml-auto">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                    <a class="nav-link active" href="{{ route('all.products') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('pages.certifications') }}"><i class="fa fa-list-alt"></i> Certifications</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/products/1">Product 1</a>
                        <a class="dropdown-item" href="/products/2">Product 2</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('contactus')}}"><i class="fa fa-phone"></i> Contact Us</a>
                    </li>
                    <li class="cart dropdown nav-item">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </div>
                                <?php $total = 0 ?>
                                @foreach((array) session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                @endforeach
                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                    <p>Total: <span class="text-info">BDT {{ $total }}</span></p>
                                </div>
                            </div>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-12 col-sm-12 col-12 cart-detail-product">
                                            <p>{{ $details['name'] }}</p>
                                            <span class="price text-info"> BDT{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand">Top IT Vendor Exams:</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <div class="main-content">
                    <div id="abc" class="owl-carousel owl-theme">
                        @foreach($vendors as $vendor)
                        <div class="item">
                            <a href="/vendors/{{$vendor->id}}">{{$vendor->name}}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="owl-theme">
                        <div class="owl-controls">
                            <div class="custom-nav owl-nav"></div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    <section id="footer" class="bg-dark pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-light">
                    <div class="foot-logo d-flex text-center"><img src="/images/logo.png" alt="" width="70px"> <h3 style="margin: auto 15px;">IT Exam Support</h3></div>
                    <p>Pass Your Next Certification Exam Fast! Everything you need to prepare, learn & pass your certification exam easily.</p>
                    <ul class="d-flex text-dark p-0" style="list-style: none;">
                        <li class="bg-light mr-3 p-1 rounded"><i class="fa fa-instagram"></i></li>
                        <li class="bg-light mr-3 p-1 rounded"><i class="fa fa-facebook"></i></li>
                        <li class="bg-light mr-3 p-1 rounded"><i class="fa fa-twitter"></i></li>
                        <li class="bg-light mr-3 p-1 rounded"><i class="fa fa-linkedin"></i></li>
                        <li class="bg-light mr-3 p-1 rounded"><i class="fa fa-google"></i></li>
                    </ul>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="row">
                        <div class="col-md-6 text-light">
                            <h5>ABOUT US</h5>
                            <ul style="list-style:none; padding-left: 0;">
                                <li><a class="text-info" href="">About Us</a></li>
                                <li><a class="text-info" href="{{route('contactus')}}">Contact Us</a></li>
                                <li><a class="text-info" href="/user_register">Join Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-light">
                            <h5>MORE LINKS</h5>
                            <ul style="list-style:none; padding-left: 0;">
                                <li><a href="">About Us</a></li>
                                <li><a href="{{route('contactus')}}">Contact Us</a></li>
                                <li><a href="/user_register">Join Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4 text-light">
                    <h5>HAVE A QUESTION?</h5>
                    <p><i class="fa fa-map-marker"></i> Plot:07, Road:06, Sector:04, Dhaka 1230</p>
                    <p><i class="fa fa-phone"></i> +880 1618884435</p>
                    <p><i class="fa fa-envelope"></i> info@itexamsupport.com</p>
                </div>
            </div>
        </div>
    </section>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#def').owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:1500,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:6
                    }
                }
            });
            $('#abc').owlCarousel({
                loop: true,
                margin: 10,
                autoplay:true,
                autoplayTimeout:2500,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items: 4
                    },
                    600:{
                        items: 5
                    },
                    1000:{
                        items: 10
                    }
                }
            });
        });
    </script>
    @livewireScripts
</body>
</html>
