@extends('layouts.app')

@section('content')
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