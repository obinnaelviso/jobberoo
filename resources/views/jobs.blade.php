@extends('layout.main')
@section('title', $category->title.' Jobs - Jobberoo')
@section('nav-title', $category->title.' Jobs')
@section('content')
@include('layout.global-header')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Latest Jobs</span>
                        <h2 class="mb-4">{{ $jobs_count }} Hot {{ $category->title }} Jobs</h2>
                    </div>
                </div>
                <div class="row">
                    @include('layout.alerts')
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
                                    {{-- <div>
                                        <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                            <span class="icon-heart"></span>
                                        </a>
                                    </div> --}}
                                    @if($job->user_id != $user->id)
                                        <button type="button" class="btn btn-primary py-2" data-toggle="modal" data-target="#apply_{{ $job->id }}">Apply Job</button>
                                    @endif
                                    {{-- <button type="button" class="btn btn-primary pull-right py-2" data-toggle="modal" data-target="#view_{{ $job->id }}"><i class="icon-eye" aria-hidden="true"></i> View Job</button> --}}
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
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{ $jobs->links() }}
                        {{-- <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom-js')
<script>
$('#file').on("change", function(){
    // Name of file and placeholder
    var file = this.files[0].name;
    if($(this).val()){
      $('#file_name').html("<strong>"+file+"</strong>");
    }
  });
</script>
@endsection
