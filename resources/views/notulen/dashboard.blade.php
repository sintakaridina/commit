@extends('layouts.app-notulen')

@section('content')


            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-dark text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard {{ Auth::user()->role }}
              </h3>
              <!-- <a href="notulen_newnote" class="btn download-button bg-gradient-dark purchase-button ml-auto"> <i class="mdi mdi-plus-box">Tambah Notulensi</i> </a> -->
                </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Rapat</h4>
                    @if(empty($meets))
                    <p> Data Rapat Belum Tersedia </p>
                    @else
                    <div class="table-responsive">
                      <table class="table table-striped  table-bordered">
                        <thead>
                          <tr>
                            <th> Judul </th>
                            <th> Tanggal Rapat </th>
                            <th> Record </th>
                            <th> Status Rapat </th>
                            <th> Status Laporan </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($meets as $meet)
                          <tr>
                            <td>{{ $meet->title }}</td>
                            <td>{{ $meet->date }}</td>
                            @if(empty($meet->rec))  
                            <td>
                              -
                            </td>
                            @else
                            <td> <a href="{{$meet->rec}}"  target="_blank"><i class="mdi mdi-library-plus">Lihat Rekaman </i></a>  </td>
                            @endif
                            @if($meet->meetStatus =='soon')  
                            <td><label class="badge badge-secondary" >Belum berjalan</label></td>
                            <td><label class="badge badge-secondary" > Belum ada laporan</label></td>  
                            <td> - </td>
                            @else
                              @if($meet->meetStatus =='on-going')   
                              <td>
                              <label class="badge badge-danger" >Sedang Berjalan</label>
                              </td>
                              @elseif($meet->meetStatus =='done')
                              <td>
                              <label class="badge badge-dark" >Selesai</label>
                              </td>
                              @endif
                              @if($meet->noteStatus =='validate')   
                              <td>
                                <label class="badge badge-dark">Telah Divalidasi</label>
                              </td>
                                @if(empty($meet->rec))  
                                <td>
                                  <a href="javascript:void(0)" class="badge badge-gradient-success" id="add-rec" data-toggle="modal">Tambahkan Rekaman</a>
                                </td>
                                @else
                                <td>
                                  <!-- <a href="javascript:void(0)" class="badge badge-gradient-success" id="edit-rec" data-toggle="modal" data-id="{{ $meet->id }}">Edit link Rekaman</a> -->
                                -
                                </td>
                                @endif
                              @elseif($meet->noteStatus =='decline')  
                              <td>
                                <label class="badge badge-gradient-danger">Validasi Ditolak</label>
                              </td>
                              <td> <a class="badge badge-gradient-success" href="{{ route('notulen.editnote', $meet->note_id) }}">SUNTING</a> &nbsp;&nbsp; | &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="{{ route('notulen.delete', $meet->note_id) }}">HAPUS</a> </td>
                              @elseif($meet->noteStatus =='belum')
                              <td>
                                <label class="badge badge-gradient-warning">Belum Divalidasi</label>
                              </td>
                              <td> <a class="badge badge-gradient-success" href="{{ route('notulen.editnote', $meet->note_id) }}">SUNTING</a> &nbsp;&nbsp; | &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="{{ route('notulen.delete', $meet->note_id) }}">HAPUS</a> </td>
                              @else
                              <td>
                              <label class="badge badge-gradient-primary">Belum Ditambahkan</label>
                              </td>
                              <td>
                              <a class="badge badge-gradient-success" href="{{ route('notulen.newnote', $meet->id) }}">Tambahkan Notulensi</a>
                              </td>
                              @endif
                              
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
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
              </div>
              
            </div>
          </div>
          @if(isset($meet))
            <!-- Add and Edit konsumsi modal -->
            <div class="modal fade" id="crud-modal" aria-hidden="true" >
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="recCrudModal"></h4>
            </div>
            <div class="modal-body">
            <form name="custForm" action="{{ route('rec.store', $meet->id) }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Masukkan Link:</strong>
            <input type="text" name="rec" id="rec" class="form-control" placeholder="Link Rekaman" onchange="validate()" >
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
            <a href="{{ route('notulen.dashboard') }}" class="btn btn-danger">Cancel</a>
            </div>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
            @endif
@endsection
<script>
error=false

function validate()
{
	if(document.custForm.rec.value !='')
	    document.custForm.btnsave.disabled=false
	else
		document.custForm.btnsave.disabled=true
}
</script>