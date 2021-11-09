@extends('layouts.mainlayout')
@section('page_tittle','List Toko')
@section('custom_css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('tittle','List Toko')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">List Toko</li>
@endsection

@section('content')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">List Toko</h3>
	</div>
	<div class="card-body">
    <div class="row">
             
            </div>
		<table id="example2" class="table table-bordered table-hover">
			<thead>
				<tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Barcode</th>
                    <th class="text-center">Nama Toko</th>
                    <th class="text-center">Latitude</th>
                    <th class="text-center">Longitude</th>
                    <th class="text-center">Accuracy</th>
                    <th class="text-center">Cetak Barcode</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($lokasi_toko as $lk)
            	<tr>
            		<td>{{ $loop->iteration}}</td>
            		<td class="mb-3" align="center">{!! DNS2D::getBarcodeHTML($lk->barcode, 'QRCODE') !!}
                <h8 class="text-center">{{$lk->barcode}}</h8> <br></td>
            		<td>{{ $lk->nama_toko}}</td>
                <td>{{ $lk->latitude}}</td>
            		<td>{{ $lk->longitude}}</td>
                <td>{{ $lk->accuracy}}</td>
                <td><a href="toko-barcode/{{$lk->barcode}}"><button type="button" class="btn btn-outline-info">Cetak Barcode</button></a></td>
            	</tr>
            	@endforeach
            </tbody>
            </table>

            
        </div>
    </div>
@endsection


@section('custom_js')
<!-- DataTables  & Plugins -->
<script src="{{asset ('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset ('assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset ('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset ('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset ('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
