<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
</head>
<body>
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
            $('.owl-carousel').owlCarousel({
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
        });
    </script>
</body>
</html>
