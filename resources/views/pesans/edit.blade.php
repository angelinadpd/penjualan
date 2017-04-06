@extends('home')
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Pesan Barang</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('pesans.index') }}"> Back</a>
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

{{ Form::model($pesan, ['method' => 'PATCH','route' => ['pesans.update', $pesan->idpesan]]) }}
	<p>Kode</p>
	<input type="text" name="kode" value="{{ $pesan->kode }}" required="" class="form-control"><br>

	<p>Tanggal</p>
	<input type="date" name="tgl" value="{{ $pesan->tgl }}" required="" class="form-control"><br>

	<p>Nama Barang</p>
	<select name="idbarang" required="" class="form-control">
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->nama }} </option>
		@endforeach
	</select><br>

	<input type="hidden" name="_method" value="PATCH">	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
{{ Form::close() }}
@endsection