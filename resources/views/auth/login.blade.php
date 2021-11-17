@extends('layouts.app-basic')

@section('content')

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.png">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">{{ __('Login') }}</h6>
                <form method="POST" class="pt-3" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Adress" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                </div>
                  <div class="mt-3">  
                  <button type="submit" class="btn btn-block btn-gradient-dark btn-lg font-weight-medium auth-form-btn">
                  {{ __('Login') }}</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        
@endsection
