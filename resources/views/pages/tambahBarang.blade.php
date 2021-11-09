@extends('layouts.mainlayout')
@section('page_tittle','Tambah Barang')
@section('custom_css')
 <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/dropzone/min/dropzone.min.css">
@endsection

@section('tittle','Tambah Barang')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Barang</li>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Tambah Barang</h3>
	</div>
  <div class="card-body">
    <form action="/inputBarang" method='post'>
      {{ csrf_field() }}
      <!-- <div class="form-group">
        <label>Id Barang</label>
        <input type="text" name="id_barang" class="form-control" placeholder="Id Barang">
      </div> -->
      <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_brg" class="form-control" placeholder="Nama Barang">
      </div>
      <!-- <div class="card-footer text-right"> -->
        <div class=" text-right">
        <button class="btn btn-primary mr-1" type="submit" value="Simpan">Simpan Data</button>
      </div>

    </form>
  </div>
</div>
@endsection

@section('custom_js')
<!-- Select2 -->
<script src="{{asset ('assets') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset ('assets') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset ('assets') }}/plugins/moment/moment.min.js"></script>
<script src="{{asset ('assets') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset ('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset ('assets') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset ('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset ('assets') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{asset ('assets') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset ('assets') }}/plugins/dropzone/min/dropzone.min.js"></script>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection