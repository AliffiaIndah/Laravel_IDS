@extends('layouts.mainlayout')
@section('page_tittle','Tambah Data Customer')
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

@section('tittle','Tambah Data Customer')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Customer</li>
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Tambah Customer</h3>
	</div>
	<div class="card-body">
		<form action="/inputCustomer" method='post'>
			{{ csrf_field() }}
			<!-- <div class="form-group">
				<label>Id Customer</label>
				<input type="text" name="id_cust" class="form-control" placeholder="Id Customer">
			</div> -->
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" class="form-control" placeholder="Alamat">
			</div>
			<div class="form-group">
				<label>Provinsi</label>
				<select id="prov_s" name="prov_s" class="form-control" required="">
					<option value="" disabled selected="">Pilih Provinsi</option>
					@foreach($provinsi as $key)
					<option value="{{ $key->id_provinsi }}">{{ $key->nama_provinsi }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Kota</label>
				<select id="kota_s" name="kota_s" class="form-control" required="">
					<option value="" disabled selected="">Pilih Kota</option>
				</select>
			</div>
			<div class="form-group">
				<label>Kecamatan</label>
				<select id="kec_s" name="kec_s" class="form-control" required="">
					<option value="" disabled selected="">Pilih Kecamatan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Kelurahan</label>
				<select id="kel_s" name="kel_s" class="form-control" required="">
					<option value="" disabled selected="">Pilih Kelurahan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Kode Pos</label>
				<select id="kode_s" name="kode_s" class="form-control" required="">
					<option value="" disabled selected="">Pilih Kode Pos</option>
				</select>
			</div>

			<!-- KAMERA -->
			<p><font color="#FF0000">*klik Ambil Foto untuk mengambil gambar</font></p>
			<div class="form-group">
				<!-- MODAL BUTTON TAKE SNAPSHOT -->
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Ambil Foto</button>
			</div>
			<div id="result2"></div>
			<input type="text" name="imagecam" id="imagecam" hidden=true>
			<!-- <div class="card-footer text-right"> -->
				<div class="text-right">
				<button class="btn btn-primary mr-1" type="submit" value="Simpan">Simpan Data</button>
			</div>

		</form>
	</div>


<!-- MODAL TAKE SNAPSHOT -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-tittle" id="exampleModalLabel">Ambil Foto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <label>Ambil Gambar Anda</label> -->

				<!-- KAMERA -->
				<div id="my_camera"></div>
				<div id="result1"></div>
				<br>
				<div>
					<button id="btn" name="btn" class="btn btn-primary center-block">
						<i class="fa fa-camera"></i>
					</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Simpan Foto</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#myModal').on('shown.bs.modal', function(){
		$('#myInput').trigger('focus')
	})
</script>
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

<script type="text/javascript">
	$(document).ready(function(){
		$("#prov_s").change(function(){
			var prov_id=$("#prov_s").val();
			$.ajax({
				type:"get",
				url:"findKota",
				data:"prov_id="+prov_id,
				success:function(data){
					$('#kota_s').html('');
					$('#kec_s').html('');
					$('#kel_s').html('');
					$('#kode_s').html('');
					$('#kota_s').append('<option value="">Pilih Kota</option>');
					$('#kec_s').append('<option value="">Pilih Kecamatan</option>');
					$('#kel_s').append('<option value="">Pilih Kelurahan</option>');
					$('#kode_s').append('<option value="">Pilih Kodepos</option>');

					for(var i=0;i<data.length;i++){
						$('#kota_s').append('<option value="'+data[i].id_kabkot+'">'+data[i].nama_kabkot+'</option');
					}
				}
			});
		});

		$("#kota_s").change(function(){
			var kota_id=$("#kota_s").val();
			$.ajax({
				type:"get",
				url:"findKecamatan",
				data:"kota_id="+kota_id,
				success:function(data){
					$('#kec_s').html('');
					$('#kel_s').html('');
					$('#kode_s').html('');
					$('#kec_s').append('<option value="">Pilih Kecamatan</option>');
					$('#kel_s').append('<option value="">Pilih Kelurahan</option>');
					$('#kode_s').append('<option value="">Pilih Kodepos</option>');
					for(var i=0;i<data.length;i++){
						$('#kec_s').append('<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option');
					}
				}
			});
		});

		$("#kec_s").change(function(){
			var kec_id=$("#kec_s").val();
			$.ajax({
				type:"get",
				url:"findKelurahan",
				data:"kec_id="+kec_id,
				success:function(data){
					$('#kel_s').html('');
					$('#kode_s').html('');
					$('#kel_s').append('<option value="">Pilih Kelurahan</option>');
					$('#kode_s').append('<option value="">Pilih Kodepos</option>');
					for(var i=0;i<data.length;i++){
						$('#kel_s').append('<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option');
					}
				}
			});
		});

		$("#kel_s").change(function(){
			var kel_id=$("#kel_s").val();
			$.ajax({
				type:"get",
				url:"findKodepos",
				data:"kel_id="+kel_id,
				success:function(data){
					
					$('#kode_s').html('');
					
					$('#kode_s').append('<option value="">Pilih Kodepos</option>');
					for(var i=0;i<data.length;i++){
						$('#kode_s').append('<option value="'+data[i].id_kelurahan+'">'+data[i].kodepos+'</option');
					}
				}
			});
		});

		//SCRIPT WEBCAM
		Webcam.set({
			width: 320, 
			height: 240,
			image_format: 'png',
			png_quality: 100
		});
		Webcam.attach('#my_camera');
		function take_picture(){
			Webcam.snap(function(data_uri){
				$('#imagecam').val(data_uri);
				document.getElementById('result1').innerHTML = '<img src="' + data_uri +'"/>';
				document.getElementById('result2').innerHTML = '<img src="' + data_uri +'"/>';
			});
		}
		document.getElementById('btn').addEventListener('click', take_picture);
	});
</script>

@endsection