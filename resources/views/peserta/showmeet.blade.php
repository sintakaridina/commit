@extends('layouts.app-peserta')

@section('content')
            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h5 class="page-title">
                <button class="btn btn-social-icon bg-gradient-dark">
                  <i class="mdi mdi-home"></i> </button> <h5>Details Rapat </h5>
              </h5>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div id="jadwalkan" class="card-body">
                  <p class="card-description mb-5"> <a href="/peserta_dashboard">Dashboard</a> » Details Rapat</p>

                    <table class="table w-100 p-3">
                        <tr>
                            <td>Judul Rapat </td>
                            <td>: &nbsp;&nbsp; {{$meet->title}}</td>
                        </tr>
                        <tr>
                            <td>Kategori Rapat </td>
                            <td>: &nbsp;&nbsp; {{$meet->categories}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Rapat </td>
                            <td>: &nbsp;&nbsp; {{$meet->date}}</td>
                        </tr>
                        <tr>
                            <td>Link/Lokasi </td>
                            @if($meet->location==="daring")
                            <td>: &nbsp;&nbsp; <a href="{{$meet->location}}">{{$meet->location}}</a></td>
                            @else
                            <td>: &nbsp;&nbsp; {{$meet->location}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Dokumen Pendukung</td>
                            <td>: &nbsp;&nbsp; Unduh Sebagai Pdf </td> 
                        </tr>
                        @foreach ($files as $file)
                        <tr>
                            <td></td>
                            <td> &nbsp;&nbsp; <a href="{{ URL::to('/') }}/mytestfile/{{$file}}">  <b>{{$file}}</b></a> </td> 
                        </tr>
                        @endforeach
                        <tr> 
                            <td>Rekaman </td>
                            @if(isset($meet->rec))
                            <td>: &nbsp;&nbsp; {{$meet->location}}</td>
                            @else
                            <td>: &nbsp;&nbsp;  - </td>
                            @endif
                        </tr>
                        
</table>
                   
                  </div>    
                </div>
</div>

              
           
          
@endsection