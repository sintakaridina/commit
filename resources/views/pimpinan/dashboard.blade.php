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
                  <div class="card-body">
                    <h4 class="card-title">Laporan Rapat</h4>
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered">
                        <thead>
                        <thead>
                          <tr>
                            <th> Judul </th>
                            <th> Tanggal Rapat </th>
                            <th> Status Laporan </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($meets as $meet)
                          <tr>
                            @if(isset($meet->note_id))
                            <td><a href="{{ route('pimpinan.shownote', $meet->note_id) }}">{{ $meet->title }}</a></td>
                            @else
                            <td>{{ $meet->title }}</td>
                            @endif 
                            <td>{{ $meet->date }}</td>
                            @if($meet->meetStatus =='soon')  
                            <td><label class="badge badge-secondary" > Belum ada laporan </label> </td>  
                            <td> - </td>
                            @else
                              @if($meet->noteStatus =='validate')   
                              <td>
                                <label class="badge badge-gradient-success">Telah Divalidasi</label>
                              </td>
                              <td> <a class="badge badge-gradient-info" href="{{ route('pimpinan.shownote', $meet->note_id) }}">Lihat</a> </td>
                              @elseif($meet->noteStatus =='decline')  
                              <td>
                                <label class="badge badge-gradient-danger">Validasi Ditolak</label>
                              </td>
                              <td> - </td>
                              @elseif($meet->noteStatus =='belum')
                              <td>
                                <label class="badge badge-gradient-warning">Belum Divalidasi</label>
                              </td>
                              <td><a class="badge badge-gradient-success" href="{{ route('pimpinan.verifikasi', $meet->note_id) }}">Validasi</a> &nbsp;&nbsp; &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="{{ route('pimpinan.tolak', $meet->note_id) }}">Tolak</a> </td>
                              @else
                              <td>
                              <label class="badge badge-gradient-primary">Belum Ditambahkan</label>
                              </td>
                              <td>  </td>
                              @endif
                              
                            @endif
                            </tr>
                         @endforeach 
                         
                          
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