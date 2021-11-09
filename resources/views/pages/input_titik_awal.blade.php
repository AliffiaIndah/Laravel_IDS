@extends('layouts.mainlayout')
@section('page_tittle','Input Titik Awal')
@section('custom_css')
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

@section('tittle','Input Data Toko')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Toko</li>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Toko</h3>
  </div>
  <div class="card-body">
    <form action="/input_toko" method='post'>
      {{ csrf_field() }}
      
      <div class="form-group">
        <label for="inputEmail3">Nama Toko</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Toko">
      </div>

        <div class="form-group">
          <label for="inputPassword3">Latitude</label>
          <input type="latitude" class="form-control" name ="latitude" id="latitude" placeholder="Latitude" readonly >
        </div>

        <div class="form-group">
          <label for="inputPassword3">Longitude</label>
          <input type="longitude" class="form-control" name ="longitude" id="longitude" placeholder="Longitude" readonly>
        </div>

        <div class="form-group">
          <label for="inputPassword3">Accuracy</label>
          <input type="accuracy" class="form-control" name ="accuracy" id="accuracy" placeholder="Accuracy" readonly>
        </div>

        <button  class="btn btn-outline-primary mb-2" type="button" onclick="getlocation();">Geolocation</button> 

        <button type="submit" class="btn btn-outline-success mb-2 ml-1">Submit Data</button>
    </form>
</div>

@endsection

@section('custom_js')
<script>

var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var akurasi = document.getElementById("accuracy");

function getlocation()
{ 
  if(navigator.geolocation){ 
    navigator.geolocation.watchPosition(showPosition);
  }else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position)
{
  latitude.value=position.coords.latitude;
  longitude.value=position.coords.longitude;
  akurasi.value=position.coords.accuracy;
}
</script>

@endsection