@extends('layouts.app-sekret')

@section('content')

            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h5 class="page-title">
                <button class="btn btn-social-icon bg-gradient-dark">
                  <i class="mdi mdi-home"></i> </button> <h5>Re-Schedule Rapat </h5>
              </h5>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div id="jadwalkan" class="card-body">
                  <p class="card-description mb-5"> <a href="/sekret_dashboard">Dashboard</a> » Re-Schedule Rapat </p>

                    
                    <form action="{{ route('sekret.update', $meet->id) }}" method="POST" class="forms-sample container">
                    @csrf
                    @method('PUT')
                      <div class="form-group mt-4">
                        <label for="judul">Judul Rapat</label>
                        
                        <input type="text" name="title" class="form-control" id="judul" value="{{ $meet->title }}">
                      </div>
                      
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pelaksanaan Rapat</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="categories" id="pelaksanaan1" value="luring" {{ ($meet->categories=="luring")? "checked" : "" }}> Luring </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="categories" id="pelaksanaan2" value="daring" {{ ($meet->categories=="daring")? "checked" : "" }}> Daring </label>
                              </div>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input name="date" value="{{ old('tile', $meet->date) }}" class="form-control" type="datetime-local" />
                      </div>
                      <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input name="location" type="text" class="form-control" id="lokasi" value="{{ old('tile', $meet->location) }}" placeholder="Nama Gedung/Ruangan atau Link Google Meet">
                      </div>
                    
                      <button type="submit" class="btn btn-gradient-dark mr-2">Submit</button>

                
                    </form>
                  </div>    
                </div>
</div>

              
           
          
@endsection