@extends('layouts.app-sekret')

@section('content')


            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                
                <!-- <span class="page-title-icon bg-gradient-dark  mr-2">
                  <i class="mdi mdi-home"></i>
                </span> -->
                <button type="button" class="btn text-white btn-gradient-dark btn-rounded btn-icon">
                <i class="mdi mdi-home"></i>
                </button>
                <h3 class="page-title">
                Tracking Rapat
              </h3>
                
              </div>
            </div>

           
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Jadwal Rapat</h4>
                    <div class="table-responsive">
                    @if ($meets->isEmpty())
                      <div class="mt-3">Jadwal Rapat Belum Tersedia.</div>
                    @else
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Judul </th>
                            <th> Aksi </th>
                            <th>  </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($meets as $meet)
                        <tr>
                            <td>{{ $meet->title }}</td>
                            
                            <td> <a class="badge badge-gradient-warning" href="{{ route('sekret.tracking2', $meet->id) }}">View Tracking</a>  </td>
                          </tr>
                          @endforeach
                          <!-- <tr>
                            <td> Pembaharuan Kurikulum Kampus Merdeka </td>
                            <td> Denny Sagita Rusdianto, S.Kom., M.Kom. </td>
                          
                            <td> Dec 5, 2017 </td>
                            <td> <a class="badge badge-gradient-success" href="#">RE-SCHEDULE</a> &nbsp;&nbsp;  &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="#">CANCEL</a> </td>
                            <td> <a href="#"><i class="mdi mdi-library-plus">Rapat Lanjutan </i></a>  </td>
                          </tr>
                          <tr>
                            <td> Rencana Pembelajaran Luring Sebagian </td>
                            <td> Denny Sagita Rusdianto, S.Kom., M.Kom. </td>
                            <td> Dec 5, 2017 </td>
                            <td> <a class="badge badge-gradient-success" href="#">RE-SCHEDULE</a> &nbsp;&nbsp; | &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="#">CANCEL</a> </td>
                            <td> <a href="#"><i class="mdi mdi-library-plus">Rapat Lanjutan </i></a>  </td>
                          </tr> -->
                          
                        </tbody>
                      </table>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Arsip Laporan</h4>
                    <div class="table-responsive">
                    @if ($notes->isEmpty())
                      <div class="mt-3">Laporan Belum Tersedia.</div>
                    @else
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Judul Laporan </th>
                            <th> Aksi </th>
                            <th>  </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->title }}</td>
                            <td><a class="badge badge-gradient-info" href="{{ route('sekret.download', $note->id) }}">Unduh Laporan</a></td>
                          </tr>
                          @endforeach
                          <!-- <tr>
                            <td> Pembaharuan Kurikulum Kampus Merdeka </td>
                            <td> Denny Sagita Rusdianto, S.Kom., M.Kom. </td>
                          
                            <td> Dec 5, 2017 </td>
                            <td> <a class="badge badge-gradient-success" href="#">RE-SCHEDULE</a> &nbsp;&nbsp;  &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="#">CANCEL</a> </td>
                            <td> <a href="#"><i class="mdi mdi-library-plus">Rapat Lanjutan </i></a>  </td>
                          </tr>
                          <tr>
                            <td> Rencana Pembelajaran Luring Sebagian </td>
                            <td> Denny Sagita Rusdianto, S.Kom., M.Kom. </td>
                            <td> Dec 5, 2017 </td>
                            <td> <a class="badge badge-gradient-success" href="#">RE-SCHEDULE</a> &nbsp;&nbsp; | &nbsp;&nbsp;  <a class="badge badge-gradient-danger" href="#">CANCEL</a> </td>
                            <td> <a href="#"><i class="mdi mdi-library-plus">Rapat Lanjutan </i></a>  </td>
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
          {!! $meets->links() !!}

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