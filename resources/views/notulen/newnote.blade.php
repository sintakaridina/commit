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
                    <h4 class="card-title">Laporan Rapat Baru</h4>
                    
                    <div class="card-body">
                        <form class="image-upload" method="post" action="{{ route('note.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$meet->id}}">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" value="Laporan {{$meet->title}}" name="title" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="content" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                            </div>  
                            <div class="form-group">
                                <label>Dokumen Pendukung
                                @if(empty($meet->file))
                                : Tidak ada dokumen ditemukan.
                                </label>
                                @else
                                  @foreach ($files as $file)
                                  <div class="mt-2">
                                   <a href="{{ URL::to('/') }}/mytestfile/{{$file}}">  <b>{{$file}}</b></a> 
                                  </div>
                                  @endforeach
                                  </label>
                                @endif
                            </div>  
                            <h5 class="card-title">Unggah Dokumen Pendukung</h5>
                            <div class="form-group">
                            <div class="input-group control-group increment" >
                              <input type="file" name="filename[]" accept="application/pdf" class="form-control">
                              <div class="input-group-btn"> 
                                <button class="btn btn-social-icon btn-dark" type="button"><i class="mdi mdi-plus-box"></i></button>
                              </div>
                            </div>
                            <div class="clone hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="filename[]"accept="application/pdf" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-social-icon btn-youtube" type="button"><i class="mdi mdi-delete"></i></button>
                                </div>
                              </div>
                            </div>
                            </div>
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