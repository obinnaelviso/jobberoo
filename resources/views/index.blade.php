@extends('layout.main')
@section('home-active', 'active')
@section('content')
@include('layout.home-header')
<section class="ftco-section services-section bg-primary">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-resume"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Search Millions of Jobs</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-collaboration"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Easy To Manage Jobs</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-promotions"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Top Careers</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block">
            <div class="icon"><span class="flaticon-employee"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Search Expert Candidates</h3>
              <p>A small river named Duden flows by their place and supplies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Hot Jobs</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach($companies as $job)
                        <div class="card text-left">
                            <div  style="height: 200px; overflow-y: hidden"><img class="img-fluid" src="{{ asset($job->public_url) }}" alt=""></div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->company }}<span class="float-right">{{ $job->category->jobs->count() }}</span></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </section>

  <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Job Categories</span>
                    <h2 class="mb-4">Top Categories</h2>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-3 ftco-animate">
                        <ul class="category">
                            <li><a href="{{ route('jobs', $category->id) }}">{{ $category->title }}<br><span class="number">{{ $category->jobs->where('status_id', $open_status)->count() }}</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
  </section>

  <section class="ftco-section img" style="background-image: url(images/crypto_jobs_large.jpg); background-position: top center;">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="browse-job p-5">
                      <span class="icon-search2 icon"></span>
                      <span class="subheading">Search Job</span>
                      <h2>Browse Job by Specialism</h2>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>

      <section class="ftco-section bg-light">
          <div class="container">
              <div class="row">
                  <div class="col-lg-9 pr-lg-5">
                      <div class="row justify-content-center pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">Recently Added Jobs</span>
                  <h2 class="mb-4">Hot Jobs</h2>
                </div>
              </div>
              <div class="row">
                  @foreach($jobs as $job)
                      <div class="col-md-12 ftco-animate">
                          <div class="job-post-item py-4 d-block d-lg-flex align-items-center">
                              <div class="one-third mb-4 mb-md-0">
                                  <div class="job-post-item-header d-flex align-items-center">
                                      <h2 class="mr-3 text-black"><a href="#" data-toggle="modal" data-target="#view_{{ $job->id }}">{{ $job->title }}</a></h2>
                                      <div class="badge-wrap">
                                          <span class="bg-primary text-white badge py-2 px-3">{{ $job->type->title }}</span>
                                      </div>
                                  </div>
                                  <div class="job-post-item-body d-block d-md-flex">
                                      <div class="mr-3"><span class="icon-layers"></span> <a href="#">{{ $job->company }}</a></div>
                                      <div><span class="icon-my_location"></span> <span>{{ $job->location }}</span></div>
                                      <div class="text-danger"><span class="icon-account_balance_wallet ml-2"></span> <span>{{ config('app.currency').$job->salary }}</span></div>
                                  </div>
                              </div>

                              <div class="one-forth ml-auto d-flex align-items-center">
                                <a href="#" data-toggle="modal" data-target="#view_{{ $job->id }}" class="btn btn-primary py-2">Apply Job</a>
                              </div>
                          </div>
                      </div>
                      @include('dashboard.view-job-modal')
                      @include('apply-job-modal')@if($errors->any())
                         <script>
                             window.onload = function() {

                             $('#apply_{{ $job->id }}').modal('show');
                             }
                         </script>@endif
                  @endforeach
              </div>

              </div>
          </div>
      </section>

  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon">
                            <span class="flaticon-employee"></span>
                        </div>
                      <strong class="number" data-number="435000">0</strong>
                      <span>Jobs</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon">
                            <span class="flaticon-collaboration"></span>
                        </div>
                      <strong class="number" data-number="40000">0</strong>
                      <span>Members</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon">
                            <span class="flaticon-resume"></span>
                        </div>
                      <strong class="number" data-number="30000">0</strong>
                      <span>Resume</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                        <div class="icon">
                            <span class="flaticon-promotions"></span>
                        </div>
                      <strong class="number" data-number="10500">0</strong>
                      <span>Company</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      </div>
  </section>


  <section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Testimonial</span>
          <h2 class="mb-4">Happy Clients</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap py-4 pb-5">
                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Marketing Manager</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4 pb-5">
                <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Interface Designer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4 pb-5">
                <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">UI Designer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4 pb-5">
                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Web Developer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4 pb-5">
                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">System Analyst</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Our Blog</span>
          <h2><span>Recent</span> Blog</h2>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text mt-3">
                <div class="meta mb-2">
                <div><a href="#">May 3, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text mt-3">
                <div class="meta mb-2">
                <div><a href="#">May 3, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text mt-3">
                <div class="meta mb-2">
                <div><a href="#">May 3, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
            </a>
            <div class="text mt-3">
                <div class="meta mb-2">
                <div><a href="#">May 3, 2019</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
          <div class="container">
          <div class="row d-flex justify-content-center">
              <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                  <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                      <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                      </div>
                  </form>
                  </div>
              </div>
              </div>
          </div>
          </div>
      </div>
  </section>
@endsection
