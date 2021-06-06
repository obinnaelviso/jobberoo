@extends('layout.main')
@section('title', 'Manage Profile - '.config('app.name'))
@section('nav-title', 'Manage Profile')
{{-- @section('dashboard-active', 'active') --}}
@section('profile-active', 'active')
@section('content')
@include('layout.global-header')
<div class="ftco-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ route('dashboard') }}"><< Back to Dashboard</a>
        </div>
        <div class="col-md-8 mb-5">
            <form action="{{ route('dashboard.manage.profile') }}" class="p-5 bg-white" method="POST">
                @csrf @method('PUT')
                @include('layout.errors')
                @include('layout.alerts')
                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" value="{{ old('firstname')?:$user->firstname }}" class="form-control" placeholder="eg. John" required>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" value="{{ old('lastname')?:$user->lastname }}" class="form-control" placeholder="eg. Doe" required>
                    </div>
                </div>
                <div class="row form-group mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="gender">Gender</label>
                      <select name="gender" class="form-control" id="gender">
                          <option value="" disabled selected>Choose your gender: </option>
                          <option {{ ($user->gender == 'male') ? 'selected' : '' }} value="male">Male</option>
                          <option {{ ($user->gender == 'female') ? 'selected' : '' }} value="female">Female</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="email">Email Address</label>
                      <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                  </div>

                <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Save" class="btn btn-primary  py-2 px-5">
                </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 mb-5">
            <form action="{{ route('dashboard.password.change') }}" class="p-5 bg-white" method="POST">
                @csrf @method('PUT')

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="password">Current Password</label>
                    <input type="password" id="password" name="old_password" class="form-control" placeholder="Current Password" required>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="password">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="password-confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                  </div>
                </div>


                <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Change Password" class="btn btn-primary  py-2 px-5">
                </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
