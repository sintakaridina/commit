@extends('layouts.app-pimpinan')

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
                  <p class="card-description mb-5"> <a href="/pimpinan_dashboard">Dashboard</a> » Lihat Laporan </p>
                  <div class="card-body ml-3">
                  <h3>Laporan</h3>
                  <div class="mt-5">
                   {!! $note->content !!}
                  </div>
                  <div class="mt-5">
                  <h4 class="mb-2">Dokumen</h4>
                  @if(empty($meet->file))
                  <p> Tidak ada dokumen pendukung </p>
                  @else
                   @foreach ($files as $file)                  
                            <a href="{{ URL::to('/') }}/mytestfile/{{$file}}">  <b>{{$file}}</b></a> 
                   @endforeach  
                   @endif   
                   <div>
                   @if($note->status === "belum")  
                   <div class="mt-5 row mx-auto" style="width: 500px;">
                   <div class="col-6">
                   <a href="{{ route('pimpinan.verifikasi', $note->id) }}" class="btn btn-dark ml-auto"> Verifikasi </a>
                   </div>
                   <div class="col-6">
                   <a href="{{ route('pimpinan.tolak', $note->id) }}" class="btn btn-light ml-auto"> Tolak </a>
                   </div>
                    </div>
                    @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
            
              </div>
              
            </div>
          </div>

@endsection