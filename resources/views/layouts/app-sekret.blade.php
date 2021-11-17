<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>COMMIT</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
  <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <style>
      .cloneDefault{
      display: none;
      }
    </style>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="/"><img src="{{ asset('assets/images/logo-mini.png') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{ asset('assets/images/faces-clipart/pic-1.png') }}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"> {{ Auth::user()->name }}</p>
                </div>
              </a>
            </li>
           
        
            
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="mdi mdi-power"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </li>
           
          </ul>
         
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ asset('assets/images/faces-clipart/pic-1.png') }}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  <span class="text-secondary text-small">{{ Auth::user()->role }} rapat</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sekret.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sekret.newmeet') }}">
                <span class="menu-title">Rencanakan Rapat</span>
                <i class="mdi mdi-library-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sekret.tracking') }}">
                <span class="menu-title">Tracking Rapat</span>
                <i class="mdi mdi-library-plus menu-icon"></i>
              </a>
            </li>
            
            
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper ">
       
            @yield('content')
       
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>


    <!-- container-scroller -->
    <!--Multiple File Uploads-->
    
<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-dark").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-youtube",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Select 2 Multiple Js-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            }); 
            
    </script>
   <!--Tab Content-->
   <script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         
            var y = $(event.relatedTarget).text();  
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
    </script>
    <script>
    $(document).ready(function() {

function templateResult(item, container) {
  // replace the placeholder with the break-tag and put it into an jquery object
  return $('<span>' + item.text.replace('[br]', '<br/>') + '</span>');
}

function templateSelection(item, container) {
  // replace your placeholder with nothing, so your select shows the whole option text
  return item.text.split('[br]')[0];
}

$('.js-example-basic-single').select2({
  templateResult: templateResult,
  templateSelection: templateSelection
});
$('.js-example-basic-multiple').select2({
  templateResult: templateResult,
  templateSelection: templateSelection
}

);

});
</script>
    <!--Konsumsi-->

    <script>
$(document).ready(function () {

/* When click New customer button */
$('#new-konsumsi').click(function () {
$('#btn-save').val("create-konsumsi");
$('#konsumsi').trigger("reset");
$('#konsumsiCrudModal').html("Tambahkan Konsumsi");
$('#crud-modal').modal('show');
});

/* Edit konsumsi */
$('body').on('click', '#edit-konsumsi', function () {
var konsumsi_id = $(this).data('id');
$.get('konsumsi/'+konsumsi_id+'/edit', function (data) {
$('#konsumsiCrudModal').html("Edit konsumsi");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#id').val(data.id);
$('#name').val(data.name);
$('#email').val(data.email);
$('#address').val(data.address);
})
});
/* Show konsumsi */
$('body').on('click', '#show-konsumsi', function () {
$('#konsumsiCrudModal-show').html("konsumsi Details");
$('#crud-modal-show').modal('show');
});

/* Delete konsumsi */
$('body').on('click', '#delete-konsumsi', function () {
var konsumsi_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "http://127.0.0.1:8000/konsumsi/"+konsumsi_id,
data: {
"id": konsumsi_id,
"_token": token,
},
success: function (data) {
$('#msg').html('Konsumsi entry deleted successfully');
$("#konsumsi_id_" + konsumsi_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
  </body>
</html>