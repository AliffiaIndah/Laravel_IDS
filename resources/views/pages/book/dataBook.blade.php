@extends('layouts.mainlayout')
@section('pages_tittle','Data Book')
@section('breadcrumb')
 <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Data Book</li>
  
@endsection
@section('tittle', 'Data Book')

@section('content')
<!-- row -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Book</h3>
	</div>
	<div class="card-body">
        <div><a href='/book/insertBook' type="button" class="btn btn-primary">Tambah Book</a></div>
        <br>
        
		<table id="example2" class="table table-bordered table-hover">
			<thead>
				<tr>
                    <th class="text-center">Nama Buku</th>
                    <th class="text-center">Author</th>
                    <th class="text-center">Action</th>
                    <!-- <th class="text-center">File Path</th> -->
                    
                </tr>
            </thead>
            <tbody>
            	@foreach($book as $data)
            	<tr>
                
                    <td>{{ $data["name"] }}</td>
                    <td>{{ $data["author"] }}</td>
                    <td>
                        <a href='/book/editBook/{{ $data["id"] }}' type="button" class="btn btn-primary"><i class="fas fa-edit"></i> Edit
                            </a>
                            <form action='/book/hapus/{{ $data["id"] }}' method="post">
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Hapus</button>
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>                
                </tr>
                @endforeach
            </tbody>
		</table>
	</div>
</div>
@endsection