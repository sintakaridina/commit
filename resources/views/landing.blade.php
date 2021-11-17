@extends('layouts.app-guest')

@section('content')
<div  id="home" class="container-scroller">
      <div class="container-fluid align-items-center page-body-wrapper full-page-wrapper bg-gradient-light">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#home"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.png') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item">
                            <a href="/{{ Auth::user()->role }}_dashboard" class="btn btn-block bg-dark text-white">
                                Dashboard
                            </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                    </a>
                            </li>
                        @endguest
                    </ul>
          </div>
        
         
      </nav>          
            <div class="flex-grow mt-5">
            <div class="col-lg-12 mx-auto">
              <div class="row align-items-center d-flex flex-row mt-5 pt-5">
                <div class="col text-lg-center">
                  <h1 class="display-1 mb-0"><img src="{{ asset('assets/images/meet.jpg') }}" width="70%"/></h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2>Selamat Datang!</h2>
                  <h4 class="mb-5">Laboratorium Rekayasa Perangkat Lunak Fakultas Ilmu Komputer Universitas Brawijaya</h4>
                  <a class="btn btn-download bg-gradient-dark text-white" href="/login">Getting Started ..</a>
                </div>
                <!-- <div class="col-12 text-center mt-xl-2">
                <img src="{{ asset('assets/images/logo-new.png') }}"/>
                </div>
                <div class="col-12 text-center mt-xl-2">
                  <h2>Welcome!</h2>
                  <h5 class="font-weight-light">Laboratorium Rekaysa Perangkat Lunak Universitas Brawijaya</h5>
                </div> -->
              </div>
              <!-- <div class="row mt-5 pt-5">
                <div class="col-12 text-center mt-xl-2 ">
                  <a class="btn btn-download bg-gradient-dark text-white" href="/login">Getting Started ..</a>
                </div>
              </div> -->
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3e4b5b" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
          </div>


      
      <!-- page-body-wrapper ends -->
    </div>
    <div class="align-items-center bg-dark">
    <div class="row align-items-center d-flex flex-row">
    <div class="col-lg-6 mx-auto">
                <div class="col error-page-divider text-lg-center text-white pt-5 pl-lg-4">
                  <h2>Tentang Commit</h2>
                  <h5 class="m-5">Commit merupakan website sistem informasi manajemen pengelolaan rapat yang diselenggarakan oleh Laboratorium Rekayasa Perangkat Lunak Fakultas Ilmu Komputer Universitas Brawijaya</h5>
                </div>
    </div>
    </div>
    </div>
    <div id="about" class="align-items-center bg-dark">
    <div class="row align-items-center d-flex flex-row pb-5">
    <div class="col-lg-8 mx-auto">
              <div class="row align-items-center text-white d-flex flex-row mt-5 mb-5 pt-5">
                <div class="col text-lg-center">
                  <p><img src="{{ asset('assets/images/art-pdf.png') }}" width="40%"/> Laporan </p>
                </div>
                <div class="col text-lg-center">
                  <p><img src="{{ asset('assets/images/art-calendar.png') }}" width="40%"/> Jadwal </p>
                </div>
                <div class="col text-lg-center">
                  <p><img src="{{ asset('assets/images/art-email.png') }}" width="40%"/> Publikasi </p>
                </div>
              </div>
    </div>
                

</div>
</div>
<div class="align-items-center bg-gradient-light">
    <div class="row align-items-center d-flex flex-row">
    <div class="col-lg-12 p-3 mx-auto">
    <div class="row align-items-center d-flex flex-row">
                <div class="col text-lg-center ml-5">
                  <p>Created by Tim Pkl</p>
                </div>
                <div class="col text-lg-left pl-lg-4">
                  <p>Fakultas Ilmu Komputer Universitas Brawijaya</p>
                </div>
    </div>

    </div>
    </div>
    </div>
  
    
    @endsection