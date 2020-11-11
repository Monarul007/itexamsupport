@extends('layouts.app')

@section('content')
<section class="pt-3" id="with-search">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a class="navbar-brand" href="#"><img src="/images/logo.png" alt="" width="100px"margin="left"></a>
            </div>
            <div class="col-md-5 ml-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter Your Text..." aria-label="Enter Your Text" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button">SEARCH</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="middle-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h3 style=color:green;>Pass Your IT Certification Exam</h3>
          <p style=color:green>100% Money Back Garantee</p>
          <p style="color:red";>Sign Up now and get discount vouchers</p>
        </div>
        <div class="col-md-4pb-3">
            <ul class="nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link active" href="/user_register"><i class="fa fa-user"></i> Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login"><i class="fa fa-sign-in"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contactus')}}"><i class="fa fa-phone"></i> Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}"><i class="fa fa-rss"></i> Blog</a>
                </li>
            </ul>
        </div>
      </div>
    </div>
</section>

  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="#">Top IT Vendor Exams:</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="#">Cisco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Vmware</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Oracle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Microsoft</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Comp TIA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Amazon AWS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">RedHat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Huawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ITILv4</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ec-Council</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Micro Tik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CISA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CISM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">PMP</a>
        </li>
      </ul>
    </div>
  </nav>
<section id="under-nav" class="mt-5 mb-3">
  <div class="container">
    <div class="default-heading text-center"><h1>Pass Your Next Certification Exam Fast!</h1></div>
    <h5 class="text-center">Everything you need to prepare, learn & pass your certification exam easily.</h5>
  </div>
</section>
<section id="e">
  <div class="container">
    <h3 class="text-center mt-5 mb-5">Our Top Certifications</h3>
      <div class="owl-carousel">
          <div><img src="images/logos/aws-certified-cloud-practitioner.png" alt=""></div>
          <div><img src="images/logos/casp.png" alt=""></div>
          <div><img src="images/logos/microsoft-certified-azure-fundamentals.png" alt=""></div>
          <div><img src="images/logos/mta.png" alt=""></div>
          <div><img src="images/logos/vcp-cma-2020.png" alt=""></div>
          <div><img src="images/logos/cct-data-center.png" alt=""></div>
          <div><img src="images/logos/ceh.png" alt=""></div>
          <div><img src="images/logos/comptia-a-plus.png" alt=""></div>
          <div><img src="images/logos/devnet-associate.png" alt=""></div>
          <div><img src="images/logos/mcsa-sql-2016-bi-development.png" alt=""></div>
      </div>
  </div>
</section>
  <section class="mt-5">
      <div class="container my-5">
          <div class="row">
              <div class="col-12 col-sm-6 order-2 order-sm-1">
              <a class="navbar-brand" href="#"><img src="/images/person.jpg" alt="" width="500px"margin="left"></a>            </div>
              <div class="col-12 col-sm-6 order-1 order-sm-2">
                  <p class="h2">Pearson vue</p>
                  <p class="text-justify p-0 pr-sm-5">Pearson VUE is the global leader in computer-based testing for high-stakes certification and licensure exams in the healthcare, finance, information technology, academic and admissions markets. We offer a full suite of services to develop, manage, deliver and grow test programmes for over 450 clients via the world’s most comprehensive network of highly secure test centres in 180 countries, and through online solutions. Pearson VUE owns Certiport, the global leader in foundational IT certification solutions, and is a business of the world's leading learning company Pearson (NYSE: PSO; LSE: PSON).</p>
              </div>
          </div>
          <div class="row my-5">
              <div class="col-12 col-sm-6">
                  <p class="h2">British Council</p>
                  <p class="text-justify p-0 pr-sm-5">The British Council is the UK’s international organisation for cultural relations and educational opportunities. We are on the ground in six continents and over 100 countries, bringing international opportunity to life, every day.
                  The British Council is committed to a policy of equal opportunity and is keen to reflect the diversity of UK society at every level within the organisation. 

                  We welcome applications from all sections of the community. We are committed to employing disabled people. </p>
              </div>
              <div class="col-12 col-sm-6 ">
              <a class="navbar-brand" href="#"><img src="/images/british.jpg" alt="" width="500px"margin="left"></a>            </div>
              
          </div>
      </div>
  </section>
@endsection