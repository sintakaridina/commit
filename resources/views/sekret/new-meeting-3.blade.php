@extends('layouts.app-sekret')

@section('content')

            <div class="row">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <h5 class="page-title">
                <button class="btn btn-social-icon bg-gradient-dark">
                  <i class="mdi mdi-home"></i> </button> <h5> Masukkan Details Konsumsi </h5>
              </h5>
                  <!-- <a href="#" class="btn download-button purchase-button ml-auto"> [+] Rencanakan Rapat</a>
-->            </span>
              </div>
            </div>

           
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div id="jadwalkan" class="card-body">
                  <p class="card-description mb-5"> <a href="/sekret_dashboard">Dashboard</a> » Masukkan Details Konsumsi </p>

                    
                    <div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="javascript:void(0)" class="btn btn-success mb-2" id="new-konsumsi"  data-toggle="modal">+ Tambah</a>
</div>
</div>
</div>
<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p id="msg">{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Nama</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Total Harga</th>
<th width="280px">Action</th>
</tr>

@foreach ($konsumsi as $k)
<tr id="konsumsi_id_{{ $k->id }}">
<td>{{ $k->nama }}</td>
<td>{{ $k->harga }}</td>
<td>{{ $k->jumlah }}</td>
<td>{{ $k->jumlah * $k->harga}}</td>
<td>
<form action="{{ route('konsumsi.destroy',$k->id) }}" method="POST">
<a class="btn btn-info" id="show-konsumsi" data-toggle="modal" data-id="{{ $k->id }}" >Show</a>
<a href="javascript:void(0)" class="btn btn-success" id="edit-konsumsi" data-toggle="modal" data-id="{{ $k->id }}">Edit </a>
<meta name="csrf-token" content="{{ csrf_token() }}">
<a id="delete-konsumsi" data-id="{{ $k->id }}" class="btn btn-danger delete-user">Delete</a></td>
</form>
</td>
</tr>
@endforeach

</table>
<br>
<a href="/sekret_newdetails/{{ app('request')->input('id') }}" class="btn download-button bg-gradient-dark purchase-button ml-auto">Simpan Rapat </a>
{!! $konsumsi->links() !!}
<!-- Add and Edit konsumsi modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="konsumsiCrudModal"></h4>
</div>
<div class="modal-body">
<form name="custForm" action="{{ route('konsumsi.store') }}" method="POST">
<input type="hidden" name="id" id="id" >
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Konsumsi:</strong>
<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Konsumsi" onchange="validate()" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Jumlah:</strong>
<input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" onchange="validate()">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga:</strong>
<input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" onchange="validate()" onkeypress="validate()">
</div>
</div>

<input type="hidden" id="meet_id" name="meet_id" value="{{ app('request')->input('id') }}">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
<a href="{{ route('sekret.newmeet3') }}?id={{ app('request')->input('id') }}" class="btn btn-danger">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- Show konsumsi modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="konsumsiCrudModal-show"></h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2"></div>
<div class="col-xs-10 col-sm-10 col-md-10 ">
@if(isset($k->nama))

<table>
<tr><td><strong>Nama:</strong></td><td>{{$k->nama}}</td></tr>
<tr><td><strong>Harga:</strong></td><td>{{$k->harga}}</td></tr>
<tr><td><strong>Jumlah:</strong></td><td>{{$k->jumlah}}</td></tr>
<tr><td colspan="2" style="text-align: right "><a href="{{ route('sekret.newmeet3') }}?id={{ app('request')->input('id') }}" class="btn btn-danger">OK</a> </td></tr>
</table>
@endif
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
<script>
error=false

function validate()
{
	if(document.custForm.nama.value !='' && document.custForm.harga.value !='' && document.custForm.jumlah.value !='')
	    document.custForm.btnsave.disabled=false
	else
		document.custForm.btnsave.disabled=true
}
</script>