@extends('layouts.app-sekret')

@section('content')


            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h5 class="page-title">
                <button class="btn btn-social-icon bg-gradient-dark">
                  <i class="mdi mdi-home"></i> </button> <h5>Tracking Rapat </h5>
              </h5>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <p class="card-description mb-5"> <a href="/sekret_dashboard">Dashboard</a> » Tracking Rapat Details </p>

                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Judul  </th>
                            <th>: {{ $meet->title }} </th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Status  </td> 
                            <td>: {{ $meet->status }} dilaksanakan</td>
                        </tr>
                    
                        </tbody>
                      </table>
                      <br>
                      <br>

                      <table class="table table-striped  table-bordered">
                        <thead>
                          <th>Rapat</th>
                          <th>Tanggal</th>
                          <th>Dokumen</th>
                          <th>Hasil Rapat</th>
                          <th>Record</th>
                        </thead>
                          <tbody>
                          <tr>
                              <td><a href="{{ route('sekret.newdetails', $meet->id) }}">Rapat pertama</a></td>
                              <td>{{ $meet->date}}</td>
                              @if(isset($meet->file))
                               @foreach($files as $file)
                                <td> <a href="{{ URL::to('/') }}/mytestfile/{{$file}}">{{$file}}</a> </td>
                                @endforeach
                              @else
                              <td> - </td>
                              @endif
                              @if(isset($note) && $note->status=='validate')
                              <td><a class="badge badge-gradient-info" href="{{ route('sekret.download', $note->id) }}">Unduh Laporan</a></td>
                              @else
                              <td>Belum ada laporan</td>
                              @endif  
                              @if(empty($meet->rec))
                              <td> - </td>
                              @else
                              <td> <a href="{{$meet->rec}}">{{$meet->rec}}</a> </td>
                              @endif
                            </tr>
                      <?php $i = 1 ?>
                      @foreach ($tracking as $track)
                        <tr>
                        <?php $i++ ?>
                            <td><a href="{{ route('sekret.newdetails', $track->id) }}">Rapat ke-{{ $i}}</a></td>
                            <td>{{ $track->date }}</td>
                            @if(isset($track->note_id))
                            <td><a class="badge badge-gradient-info" href="{{ route('sekret.download', $track->note_id) }}">Unduh Laporan</a></td>
                            @else
                            <td>Belum ada laporan</td>
                            @endif  
                            @if(empty($track->rec))
                              <td> - </td>
                            @else
                              <td> <a href="{{$track->rec}}">{{$track->rec}}</a> </td>
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


          <!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>

@endsection