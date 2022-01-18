@extends('layouts.mainlayout')
@section('pages_tittle','Data Cust')
@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Data Cust</li>
  
@endsection
@section('tittle', 'Data Cust')

@section('content')
<!-- row -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Customer</h3>
	</div>
	<div class="card-body">
		<table id="example2" class="table table-bordered table-hover">
			<thead>
				<tr>
                    
                    <th class="text-center">ID Customer</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">kodepos</th>
                    <!-- <th class="text-center">File Path</th> -->
                    
                </tr>
            </thead>
            <tbody>
            	@foreach($cust as $data)
            	<tr>
            		
                <td>{{ $data->id_customer }}</td>
                    <td>{{ $data->nama}}
                    </td>
                    <td>{{ $data->alamat}}</td>
                    <td>{{ $data->kodepos}}</td>
                </tr>
                @endforeach
            </tbody>
		</table>
	</div>
</div>
@endsection