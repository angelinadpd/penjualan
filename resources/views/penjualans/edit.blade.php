@extends('home')
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Penjualan</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('penjualans.index') }}"> Back</a>
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

{{ Form::model($penjualan, ['method' => 'PATCH','route' => ['penjualans.update', $penjualan->idpenjualan]]) }}
	<p>Tanggal</p>
	<input type="date" name="tgl" value="{{ $penjualan->tgl }}" required="" class="form-control"><br>

	<p>ID Pembeli</p>
	<select name="idpembeli" class="form-control">
		@foreach($pembeli as $pembeli)
			<option value="{{ $pembeli->idpembeli }}"> {{ $pembeli->nama }} </option>
		@endforeach
	</select><br>

	<p>ID Barang</p>
	<select name="idbarang" class="form-control">
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->type }} </option>
		@endforeach
	</select><br>

	<p>Qty</p>
	<input type="text" name="qty" value="{{ $penjualan->qty }}" required="" class="form-control"><br>

	<p>Amount</p>
	<div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="amount" value="{{ $penjualan->amount }}" class="form-control" required="">
        <span class="input-group-addon">.00</span>
    </div><br>
	

	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Save</button>
{{Form::close()}}
@endsection