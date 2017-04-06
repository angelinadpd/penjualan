@extends('home')
@section('content')

<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Supplier</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('suppliers.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

{{ Form::model($supplier, ['method' => 'PATCH','route' => ['suppliers.update', $supplier->idsupplier]]) }}
	<p>Nama Supplier</p>
	<input type="text" name="nama" value="{{ $supplier->nama }}" required="" class="form-control"><br>

	<p>Alamat</p>
	<input type="text" name="alamat" value="{{ $supplier->alamat }}" required="" class="form-control"><br>

	<p>Telp</p>
	<input type="text" name="telp" value="{{ $supplier->telp }}" required="" class="form-control"><br>

	<input type="hidden" name="_method" value="PATCH">	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
{{ Form::close() }}
@endsection