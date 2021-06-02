@extends('layout.main')
@section('title', 'Register - Joberoo')
@section('nav-title', 'Registeration')
@section('register-active', 'active')
@section('content')
@include('layout.global-header')
<section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
          <div class="col-md-6 offset-md-3 bg-success">
            <form action="{{ route('register') }}" method="POST" class="bg-white p-5">
                @csrf
                @include('layout.errors')
                @include('layout.alerts')
                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="eg. John" value="{{ old('firstname') }}" required>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="eg. Doe" value="{{ old('lastname') }}" required>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="" disabled selected>Choose your gender: </option>
                        <option {{ (old('gender') == 'male') ? 'selected' : '' }} value="male">Male</option>
                        <option {{ (old('gender') == 'female') ? 'selected' : '' }} value="female">Female</option>
                    </select>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="eg. johndoe@example.com" value="{{ old('email') }}" required>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                </div>

                <div class="row form-group mb-3">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="password-confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-12">
                    <input type="submit" value="Register" class="btn btn-primary  py-2 px-5">
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('login') }}">Already have an account? Click here to login!</a>
                    </div>
                </div>
            </form>
          </div>
      </div>
    </div>
</section>
@endsection
