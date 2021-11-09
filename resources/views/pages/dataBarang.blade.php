@extends('layouts.mainlayout')
@section('page_tittle','Daftar Barang')
@section('custom_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Checkbox -->
<link type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" />
  
@endsection

@section('tittle','Daftar Barang')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Daftar Barang</li>
@endsection

@section('content')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Barang</h3>
	</div>

	<div class="card-body">

    <form class="form-inline" action="" method="">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
  <div class="form-group mb-2">
    <label for="">Kolom </label>
        <input type="number" id="col" name="col" min="1" max="5" value="1">
  </div>
  <div class="form-group mx-sm-3 mb-2">
     <label for="">Baris </label>
        <input type="number" id="row" name="row" min="1" max="8" value="1">
  </div>
   <button id="generate" type="button" class="btn btn-info">Cetak Barcode</button>
</form>
              
      
      <!-- <button id="generate" type="button" class="btn btn-info" style="float: left;  margin: 5px">Cetak Barcode</button> -->
      
              <br>

              <div>
              <form id="frm-example" action="" method="">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    
                    <th class="text-center">
                      <input name="select_all" value="" id="example-select-all" type="checkbox" /></th>
                    </th>
                    <th class="text-center">No</th>
                    <th class="text-center">ID Barang</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Timestamp</th>
                    <th class="text-center">Barcode</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($barang as $data)

            	<tr>
                <td>{{ $data->id_barang }}</td>
            		<td>{{ $loop->iteration}}</td>
            		<td>{{ $data->id_barang}}</td>
            		<td>{{ $data->nama}}</td>
                <td>{{ $data->timestamp}}</td>
            		<td class="mb-3" align="center">{!! DNS1D::getBarcodeHTML($data->id_barang, 'C128') !!}
                  <h8 class="text-center">{{$data->id_barang}}</h8> <br>
                  <h8 class="text-center">{{$data->nama}}</h8>
                </td>
            	</tr>
            	@endforeach
            </tbody>
            </table>
          </form>
          </div>
        </div>
        

            
        
@endsection


@section('custom_js')
<!-- DataTables  & Plugins -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function (){   
   var table = $('#example').DataTable({
    "responsive": true,
    "autoWidth": false,  
    'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="check" value="' 
                + $('<div/>').text(data).html() + '">';
         }
      }],
      'order': [1, 'asc']
   });

   

 // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   $('#generate').on('click', function(e){
      var favorite = [];
      var row =  Number(document.getElementById("row").value);
      var col =  Number(document.getElementById("col").value);
      $.each($("input[name='check']:checked"), function(){
          favorite.push($(this).val());
      });
      parameter= "/"+ favorite.join()+"/"+col+"/"+row;
      url= "{{url('cetakpdf')}}";
      document.location.href=url+parameter;
       e.preventDefault(); 
   });


   });
</script>
@endsection
