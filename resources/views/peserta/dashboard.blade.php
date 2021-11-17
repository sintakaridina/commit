@extends('layouts.app-peserta')

@section('content')


            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-dark text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard Peserta
              </h3>
                 <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Tambah Notulensi</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Rapat</h4>
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered">
                        <thead>
                          <tr>
                            <th> Judul Rapat </th>
                            <th> Tanggal Rapat </th>
                            <th> Laporan </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($meets as $meet)
                          <tr>
                            <td> <a href="{{ route('peserta.showmeet', $meet->id) }}">{{$meet->title}}</a> </td>
                            <td> {{$meet->date}} </td>
                            <!-- @if($meet->categories==='daring')
                            <td> <a href="{{$meet->location}}"> {{$meet->location}} </a> </td>
                            @else
                            <td> {{$meet->location}} </td>
                            @endif -->
                            @if(isset($meet->note_id) && $meet->noteStatus==="validate")
                            <td><a class="badge badge-gradient-danger" href="{{ route('peserta.shownote', $meet->note_id) }}">Lihat</a> &nbsp; <a class="badge badge-gradient-info" href="{{ route('peserta.download', $meet->note_id) }}"> Unduh </a> </td>
                            @else
                            <td><label class="badge badge-secondary">Belum ada laporan</badge> </td>
                            @endif
                                                     
                          </tr>
                         @endforeach 
                          <!-- <tr>
                            <td> Rencana Pembelajaran Luring Sebagian </td>
                            <td> Denny Sagita Rusdianto, S.Kom., M.Kom. </td>
                            <td>
                              <label class="badge badge-gradient-success">Telah Divalidasi</label>
                            </td>
                            <td> Dec 5, 2017 </td>
                            <td> <a class="badge badge-gradient-success" href="#">SUNTING</a> &nbsp;&nbsp; | &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="#">HAPUS</a> </td>
                          
                          </tr> -->
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
              </div>
              
            </div>
          </div>

@endsection