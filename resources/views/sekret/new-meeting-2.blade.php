@extends('layouts.app-sekret')

@section('content')
            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h5 class="page-title">
                <button class="btn btn-social-icon bg-gradient-dark">
                  <i class="mdi mdi-home"></i> </button> <h5>Masukkan Details Rapat </h5>
              </h5>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div id="jadwalkan" class="card-body">
                  <p class="card-description mb-5"> <a href="/sekret_dashboard">Dashboard</a> » Masukkan Details Rapat </p>

                    
                    <form action="" method="POST" class="forms-sample container" enctype="multipart/form-data">
                    @csrf

                      <!-- <div class="form-group mt-4">
                        <label for="judul">Judul Rapat</label>
                        <input type="text" name="title" class="form-control" id="judul" placeholder="Judul Rapat">
                      </div>
                      
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pelaksanaan Rapat</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="categories" id="pelaksanaan1" value="luring" checked> Luring </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="categories" id="pelaksanaan2" value="daring"> Daring </label>
                              </div>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input name="date" class="form-control" type="datetime-local" />
                      </div>
                      <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input name="location" type="text" class="form-control" id="lokasi" placeholder="Nama Gedung/Ruangan atau Link Google Meet">
                      </div> -->

                      <h5 class="card-title">Pelaksana Rapat</h5>
                      <div class="form-group">
                        <label for="exampleSelectGender">Pimpinan Rapat</label>
                        <select class="js-example-basic-single form-control" name="pimpinan">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} [br] {{ $user->email }} </option>
                            ...
                        @endforeach
                        
                        </select>
                      </div>  
                      <div class="form-group">
                        <label for="exampleSelectGender">Notulen</label>
                        <select class="form-control js-example-basic-single" name="notulen">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} [br] {{ $user->email }} </option>
                            ...
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Peserta</label>
                        <select class="form-control js-example-basic-multiple" name="peserta[]" multiple="multiple">
                        
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} [br] {{ $user->email }} </option>
                            ...
                        @endforeach
                        </select>
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
                          <input type="file" name="filename[]" accept="application/pdf" class="form-control">
                          <div class="input-group-btn"> 
                            <button class="btn btn-social-icon btn-youtube" type="button"><i class="mdi mdi-delete"></i></button>
                          </div>
                        </div>
                      </div>
</div>
                       
                        <!-- <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-dark" type="button">Upload</button>
                          </span>
                        </div> -->
                    
                      <!-- 
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div> -->
                      <button type="submit" class="btn btn-gradient-dark mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                
                    </form>
                  </div>    
                </div>
</div>
              
           
          
@endsection