
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
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form method="POST" action="{{ route('register') }}" class="pt-3">
                  @csrf
                  <div class="form-group">
                    <input id="name" type="text" name="name"class="form-control form-control-lg" placeholder="Name" required autocomplete="name" autofocus >
                  </div>
                  <div class="form-group">
                    <input id="email" type="email" name="email" required autocomplete="email" class="form-control form-control-lg" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input id="role" type="text" name="role" class="form-control form-control-lg" placeholder="Role">
                  </div>
                  <!-- <div class="form-group">
                    <select class="form-control form-control-lg" name="role" id="role">
                      <option name="peserta" value="peserta">Peserta</option>
                      <option value="sekret">Sekretaris</option>
                      <option value="pimpinan">Pimpinan</option>
                      <option value="notulen">Notulen</option>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required autocomplete="new-password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password-confirmation" class="form-control form-control-lg" id="password-confirm" placeholder="Confirm Password" required autocomplete="new-password">
                  </div>
                  
                  <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-dark btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Register') }}
                                </button>
                   </div>

                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login" class="text-dark">Login</a>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection

