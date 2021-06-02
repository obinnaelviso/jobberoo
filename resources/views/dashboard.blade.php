@extends('layout.main')
@section('title', 'Dashboard - Jobberoo')
@section('nav-title', 'Dashboard')
@section('dashboard-active', 'active')
@section('content')
@include('layout.global-header')
<section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
          <div class="col-md-3">
            <img class="img-fluid mb-2" src="/images/image_5.jpg" alt="manage job applications"><br>
            <a href="{{ route('dashboard.manage.jobs') }}">Manage Jobs</a>
          </div>
          <div class="col-md-3">
            <a href="{{ route('dashboard.view.applications') }}"><img class="img-fluid mb-2" src="/images/image_6.jpg" alt="view job proposals"><br>
            View Job Applications</a>
          </div>
          <div class="col-md-3">
            <a href="{{ route('dashboard.manage.profile') }}"><img class="img-fluid mb-2" src="/images/image_1.jpg" alt="view profile"><br>
            Manage Profile</a>
          </div>
      </div>
    </div>
</section>
@endsection
