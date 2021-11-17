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
                Dashboard Sekretaris
              </h3>
                  <a href="sekret_newmeet" class="btn btn-icon-text bg-gradient-dark ml-auto"> <i class="mdi mdi-plus-box btn-icon-prepend"> </i> Jadwalkan Rapat Baru </a>
               
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kelola Rapat</h4>
                    <div class="table-responsive">
                      @if ($meets->isEmpty())
                      <div class="mt-3">Jadwal Rapat Belum Tersedia.</div>
                      @else
                      <table class="table table-striped  table-bordered">
                        <thead>
                          <tr>
                            <th> Judul </th>
                            <th> Tanggal </th>
                            <th> Aksi </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach ($meets as $meet)
                        <tr>
                            <td><a href="{{ route('sekret.newdetails', $meet->id) }}">{{ $meet->title }}</a></td>
                            <td>{{ $meet->date }} </td>
                            @if($meet->status=='soon')
                            <td> 
                            <a class="badge badge-gradient-success" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('sekret.start', $meet->id) }}" title="Start Meeting">START</a> &nbsp;&nbsp; 
                            <a class="badge badge-gradient-warning" href="{{ route('sekret.reschedule', $meet->id) }}">RE-SCHEDULE</a> &nbsp;&nbsp; 
                            <a class="badge badge-gradient-danger" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete', $meet->id) }}" title="Delete Meet">CANCEL MEET</a>
                            </td>
                            <td> <label class="badge badge-secondary" >Belum Dilaksanakan</label> </td>
                            @elseif($meet->status=='on-going')
                            <td> - </td>
                            <td> <label class="badge badge-gradient-primary" >Sedang Dilaksanakan</label> </td>
                            @else
                            <td> <a href="{{ route('sekret.nextmeet', $meet->id) }}"><i class="mdi mdi-library-plus">Rapat Lanjutan </i></a>  </td>
                            <td> <label class="badge badge-gradient-dark" >Rapat Selesai</label> </td>
                            @endif
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