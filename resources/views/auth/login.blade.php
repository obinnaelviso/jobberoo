@extends('layout.main')
@section('title', 'Login - '.config('app.name'))
@section('nav-title', 'Login')
@section('login-active', 'active')
@section('content')
@include('layout.global-header')
<section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
          <div class="col-md-6 offset-md-3 bg-danger">
            <form action="{{ route('login') }}" method="POST" class="p-5 bg-white">
                @csrf
                @include('layout.errors')
                @include('layout.alerts')
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
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" value="Login" class="btn btn-primary  py-2 px-5">
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('login') }}">Haven't registered yet? Click here to register!</a>
                    </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
</section>
@endsection
