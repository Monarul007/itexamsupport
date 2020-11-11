<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(images/bg.jpeg); background-size: cover; background-repeat: no-repeat;">
    <nav class="navbar navbar-expand-lg navbar-dark pl-5 pr-5" style="background-color: rgb(0 0 0 / 60%)!important">
      <a class="navbar-brand" href="/"><img src="images/logo.png" alt="" width="60px"margin="left"></a>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card" style="margin-top: 20vh;
    -webkit-box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
    box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);background-color: rgb(233 236 239 / 85%)">

                <div class="card-body" style="margin: 1.25rem;">
                <h3 style="margin-left: -1.25rem;">Login</h3>
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
                            
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
