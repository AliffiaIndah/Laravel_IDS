@extends('layouts.mainlayout')
@section('page_tittle','Data Customer')
@section('custom_css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('tittle','Data Customer')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Data Customer</li>
@endsection


@section('content')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Customer</h3>
	</div>
	<div class="card-body">
		<table id="example2" class="table table-bordered table-hover">
			<thead>
				<tr>
                    
                    <th class="text-center">ID Customer</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Alamat</th>
                    <!-- <th class="text-center">File Path</th> -->
                    <th class="text-center">Foto</th>
                   
                    <th class="text-center">Kelurahan</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($customer as $data)
            	<tr>
            		
                <td>{{ $data->id_customer }}</td>
                    <td>{{ $data->nama_customer}}
                    </td>
                    <td>{{ $data->alamat_customer}}</td>
                    <!-- <td><img src="{{ $data->foto }}" alt="" width="180" height="140"></td> -->
                    @if($data-> foto == null)
                    <td><img src=" {{asset('/storage/'.$data->file_path) }}" width="180" height="140"></td>
                    @else
                    <td><img src="{{$data->foto }}" width="180" height="140"></td>
                    @endif
                    <td>{{ $data->nama_kelurahan}}</td>
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