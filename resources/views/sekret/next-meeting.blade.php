@extends('layouts.app-sekret')

@section('content')

            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h5 class="page-title">
                <button class="btn btn-social-icon bg-gradient-dark">
                  <i class="mdi mdi-home"></i> </button> <h4>Rencanakan Rapat Lanjutan </h4>
              </h5>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div id="jadwalkan" class="card-body">
                
                    <p class="card-description mb-5"> <a href="/sekret_dashboard">Dashboard</a> » Rencanakan Rapat Lanjutan </p>
        
                    
                    <form action="" method="POST" class="forms-sample container">
                    @csrf
                    
                      <div class="form-group mt-4">
                        <label for="judul">Judul Rapat</label>
                        @if(is_null($meet->part))
                        <input type="text" name="title" class="form-control" id="judul" value="{{ $meet->title }} part 2">
                        <input type="hidden" name="part" value="2">
                        <input type="hidden" name="part_id" value="{{ $meet->id }}">
                        <input type="hidden" name="status" value="soon part 2">
                        @else
                        <input type="text" name="title" class="form-control" id="judul" value="{{ $meet->title }}. part.{{ $meet->part + 1 }}">
                        <input type="hidden" name="part" value="{{ $meet->tahap + 1 }}">
                        <input type="hidden" name="part_id" value="{{ $meet->part_id }}">
                        <input type="hidden" name="status" value="soon part {{ $meet->tahap + 1 }}">
                        @endif
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
                        <div class="daring">
                      <div class="form-group">
                        <label for="lokasi">Link Rapat</label>
                        <input name="location" type="text" class="form-control" id="lokasi" placeholder="Link Google Meet/Zoom">
                      </div>
                      </div> 
                      <div class="luring">
                      <div class="form-group">
                        <label for="lokasi">Pilih Lokasi</label>
                        <!-- <input name="location" type="text" class="form-control" id="lokasi" placeholder="Nama Gedung/Ruangan atau Link Google Meet"> -->
                        <select name="location" id="location" class="form-control">
                          <option value="Gedung B 1.2">Gedung B 1.2</option> 
                          <option value="Gedung B 1.3">Gedung B 1.3</option> 
                          <option value="Gedung B 1.4">Gedung B 1.4</option>
                          <option value="Gedung G 1.2">Gedung G 1.2</option>
                          <option value="Gedung G 1.3">Gedung G 1.3</option> 
                          <option value="Gedung G 1.4">Gedung G 1.4</option>  
                        </select>   
                      </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="tanggal">Tanggal Pelaksanaan</label>
                        <input name="date" class="form-control" type="datetime-local" />
                      </div>
                      <input type="hidden" name="status" value="soon">
                    
                      <!-- <div class="form-group">
                        <label for="exampleSelectGender">Pimpinan Rapat</label>
                        <select class="js-example-basic-single form-control" name="state">
                        <option value="AL">Alabama</option>
                            ...
                        <option value="WY">Wyoming</option>
                        </select>
                      </div>  
                      <div class="form-group">
                        <label for="exampleSelectGender">Notulen</label>
                        <select class="form-control js-example-basic-single" name="state">
                        <option value="AL">Alabama</option>
                            ...
                        <option value="WY">Wyoming</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Peserta</label>
                        <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple">
                        
                        <option value="AL">Alabama</option>
                            ...
                        <option value="WY">Wyoming</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-dark" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div> -->
                      <button type="submit" class="btn btn-gradient-dark mr-2">Submit</button>
                
                    </form>
                  </div>    
                </div>
</div>

              
           
          
@endsection
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function () {
    $(".daring").hide();
    $("#pelaksanaan1").click(function () {
        $(".luring").show();
        $(".daring").hide();
    });
    $("#pelaksanaan2").click(function () {
        $(".daring").show();
        $(".luring").hide();
    });
});
</script>