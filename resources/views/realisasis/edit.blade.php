@extends('home')
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Realisasi Pemesanan</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('realisasis.index') }}"> Back</a>
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

{{ Form::model($realisasi, ['method' => 'PATCH','route' => ['realisasis.update', $realisasi->idrealisasi]]) }}
	<p>Kode Pesan</p>
	<select name="idpesan" class="form-control" required="">
		@foreach($pesan as $pesan)
			<option value="{{ $pesan->idpesan }}"> {{ $pesan->kode }} </option>
		@endforeach
	</select><br>

	<p>Tanggal</p>
	<input type="date" name="tgl" value="{{ $realisasi->tgl }}" required="" class="form-control"><br>

	<p>Price</p>
	<div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="price" value="{{ $realisasi->price }}" required="" class="form-control">
        <span class="input-group-addon">.00</span>
    </div>

	<p>Qty</p>
	<input type="text" name="qty" value="{{ $realisasi->qty }}" required="" class="form-control"><br>

	<p>Status</p>
	<select name="status" value="{{ $realisasi->status }}" required="" class="form-control">
		<option value="{{ $realisasi->status }}"> {{$realisasi->status}} </option>
		<option> Masuk </option>
		<option> Batal </option>
	</select><br>

	<input type="hidden" name="_method" value="PATCH">	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
{{ Form::close() }}
@endsection