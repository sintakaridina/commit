@extends('layouts.app-peserta')

@section('content')


            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-dark text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard {{ Auth::user()->role }}
              </h3>
                 <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Tambah Notulensi</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                <div class="p-5">
                  <p class="card-description mb-5"> <a href="/peserta_dashboard">Dashboard</a> » Lihat Laporan </p>
                  <div class="pl-5 card-body">
                  
                   {!! $note->content !!}
                   <div class="mt-5 row mx-auto" style="width: 500px;">
                
                  
                    </div>

                  </div>
                </div>
              </div>
            </div>
            
              </div>
              
            </div>
          </div>

@endsection