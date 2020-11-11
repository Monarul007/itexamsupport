<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(images/488893054.jpg); background-size: cover; background-repeat: no-repeat;">
    <nav class="navbar navbar-expand-lg navbar-dark pl-5 pr-5" style="background-color: rgb(255 255 255 / 20%)!important;">
      <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" width="60px"margin="left"></a>
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
    <section class="form pt-5 pb-5">
        <div class="container">
            <div class="card m-auto" style="width: 600px; background-color: rgb(33 37 41 / 36%)!important; box-shadow: -1px 1px 60px 10px #000 inset;">
                <div class="card-header text-light m-auto"><h3>Register</h3></div>
                <div class="card-body">
                        @if ($success = Session::get('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $success }}</strong>
                            </div>
                        @endif
                        @if ($error = Session::get('flash_message_error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $error }}</strong>
                            </div>
                        @endif
                    <form method="POST" action="{{ route('member.register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="InputName">Name</label>
                            <input type="text" class="form-control" id="InputName" name="InputName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Email address</label>
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="InputPhone">Contact No.</label>
                            <input type="text" class="form-control" id="InputPhone" name="InputPhone" placeholder="Enter Contact No.">
                        </div>
                        <div class="form-group">
                            <label for="InputCompany">Company Name</label>
                            <input type="text" class="form-control" id="InputCompany" name="InputCompany" placeholder="Enter Company Name">
                        </div>
                        <div class="form-group">
                            <label for="InputDesignation">Designation</label>
                            <input type="text" class="form-control" id="InputDesignation" name="InputDesignation" placeholder="Enter Designation">
                        </div>
                        <div class="form-group">
                            <label for="InputLocation">Location</label>
                            <input type="text" class="form-control" id="InputLocation" name="InputLocation" placeholder="Enter Location">
                        </div>
                        <div class="form-group">
                            <label for="InputSocial">WHATSAPP/ VIBER / IMO</label>
                            <input type="text" class="form-control" id="InputSocial" name="InputSocial" placeholder="Enter WHATSAPP/ VIBER / IMO">
                        </div>
                        <div class="form-group">
                            <label for="InputStype">Service Type</label>
                            <select class="form-control" id="InputStype" name="InputStype">
                                @foreach($services as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputExam">Select Vendor Exam</label>
                            <select class="form-control" id="InputExam" name="InputExam">
                                <option value="" >select an option</option>
                                <option value="" >Cisco</option>
                                <option value="">Vmware</option>
                                <option value="">Oracle</option>
                                <option value="">Juniper</option>
                                <option value="">Microsoft</option>
                                <option value="">CompTIa</option>
                                <option value="">RedHat</option>
                                <option value="">Huawei</option>
                                <option value="" >ITILv4</option>
                                <option value="">Ec-Council</option>
                                <option value="">Micro Tik</option>
                                <option value="">CISA</option>
                                <option value="">CISM</option>
                                <option value="">PMP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputEcode">Exam Code</label>
                            <input type="text" class="form-control" id="InputEcode" name="InputEcode" placeholder="Enter Exam Code">
                        </div>
                        <div class="form-group">
                            <label for="InputTitle">Exam Title</label>
                            <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="Enter Exam Title">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input name="InputPassword" type="password" class="form-control" id="InputPassword" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block m-auto">Register</button>
                    </form>
                    <hr>
                    <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                </div>
            </div>
        </div>
    </section>


    <style>
    label {
    color: white;
    }
    .btn-google {
        color: white;
        background-color: #ea4335;
    }
    .btn-block {
        display: block;
        width: 100%;
    }
    .btn-block+.btn-block {
        margin-top: 5px;
    }
    .btn-facebook {
        color: white;
        background-color: #3b5998;
    }
    </style>
</body>
</html>