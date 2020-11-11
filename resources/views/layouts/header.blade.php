<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ITExam') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5" style="background-color: rgb(108 117 125 / 63%) !important;">
      <a class="navbar-brand" href="#"><img src="/images/logo.png" alt="" width="60px"margin="left"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contactus')}}">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog')}}">Blog</a>
          </li>
        </ul>
        <span class="navbar-text">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                    <a class="nav-link active" href="/user_register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
            </ul>
        </span>
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
</body>
</html>