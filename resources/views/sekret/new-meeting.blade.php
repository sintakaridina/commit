@extends('layouts.app-sekret')

@section('content')

            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h3 class="page-title">
                <span class="page-title-icon bg-gradient-dark text-white mr-2">
                  <i class="mdi mdi-home"></i> 
                </span>Rencanakan Rapat
              </h3>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div id="jadwalkan" class="card-body">
                  <p class="card-description mb-5"> <a href="/sekret_dashboard">Dashboard</a> » Rencanakan Rapat </p>

                    
                    <form action="" method="POST" class="forms-sample container">
                    @csrf
                      <div class="form-group mt-4">
                        <label for="judul">Judul Rapat</label>
                        <input type="text" name="title" class="form-control" id="judul" placeholder="Judul Rapat">
                      </div>
                      
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pelaksanaan Rapat</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="categories" id="pelaksanaan1" value="luring"  checked> Luring </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="categories" id="pelaksanaan2" value="daring" onClick="getResults()"> Daring </label>
                              </div>
                            </div>
                        </div>
                      <div class="daring">
                      <div class="form-group">
                        <label for="lokasi">Link Rapat</label>
                        <input name="location" type="text" class="form-control" placeholder="Link Google Meet/Zoom">
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
                        <input type="hidden" name="status" value="soon">
                      </div>
                      
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
      $(".daring").hide();
      $(".luring").show();    
    });
    $("#pelaksanaan2").click(function () {
      $(".luring").hide();
      var ele  = document.getElementById('location');
      var text = ele.value;

      text = text.slice(0, ele.selectionStart) + text.slice(ele.selectionEnd);
      ele.value = text; 
      $(".daring").show();    
    });
});
</script>