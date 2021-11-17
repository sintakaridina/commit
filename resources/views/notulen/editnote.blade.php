@extends('layouts.app-notulen')

@section('content')


            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-dark text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard {{ Auth::user()->role }} >> Sunting Laporan
              </h3>
              <!-- <a href="notulen_newnote" class="btn download-button bg-gradient-dark purchase-button ml-auto"> <i class="mdi mdi-plus-box">Tambah Notulensi</i> </a> -->
                </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Laporan Rapat</h4>
                    @if($note->status =='decline') 
                    <div class="card-body">
                      <p> Validasi ditolak </p>
                    </div>
                    @endif
                    <div class="card-body">
                        <form class="image-upload" action="{{ route('notulen.update', $note->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('PUT')
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="title" value="{{ $note->title }}" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="content" rows="5" cols="40" class="form-control tinymce-editor" >{{ $note->content }}</textarea>
                            </div>  
                            <!-- <div class="form-group">
                                <label>File</label>
                                <input type="text"  class="form-control"/>
                            </div> -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                    </div>


                  </div>
                </div>
              </div>
            </div>
            
              </div>
              
            </div>
          </div>

@endsection