@extends('layout.main')
@section('title', 'Want a Job - '.config('app.name'))
@section('nav-title', 'Want a Job')
@section('content')
@include('layout.global-header')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2 class="mb-4">Job Categories</h2>
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
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                    </div>
                                </div>

                                <div class="one-forth ml-auto d-flex align-items-center">
                                    @if($job->user_id != $user->id)
                                        <button type="button" class="btn btn-primary py-2" data-toggle="modal" data-target="#apply_{{ $job->id }}">Apply Job</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @include('dashboard.view-job-modal')
                        @include('apply-job-modal')@if($errors->any())
                           <script>
                               window.onload = function() {

                               $('#apply_{{ $job->id }}').modal('show');
                               }
                           </script>
                   @endif
                    @endforeach
                </div><!-- end -->
            </div>
        </div>
    </div>
</section>
@endsection
