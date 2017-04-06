@extends('home')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Penjualan</h2>
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
 
{{ Form::open(array('route' => 'penjualans.store','method'=>'POST')) }}
	<p>Tanggal</p>
	<input type="date" name="tgl" value="" required="" class="form-control">
	{{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}<br>

	<p>ID Pembeli</p>
	<select name="idpembeli" class="form-control" required="">
		<option> --Pilih Nama Pembeli-- </option>
		@foreach($pembeli as $pembeli)
			<option value="{{ $pembeli->idpembeli }}"> {{ $pembeli->nama }} </option>
		@endforeach
	</select>
	{{ ($errors->has('idpembeli')) ? $errors->first('idpembeli') : '' }}<br>

	<p>ID Barang</p>
	<select name="idbarang" class="form-control" required="">
		<option> --Pilih Type Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->type }} </option>
		@endforeach
	</select>
	{{ ($errors->has('idbarang')) ? $errors->first('idbarang') : '' }}<br>

	<p>Qty</p>
	<input type="text" name="qty" value="" required="" class="form-control">
	{{ ($errors->has('qty')) ? $errors->first('qty') : '' }}<br>

	<p>Amount</p>
	<div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="amount" value="" required="" class="form-control">
        <span class="input-group-addon">.00</span>
    </div>
	{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}<br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-warning" type="reset" name="reset">Reset</button>
{{Form::close()}}
@endsection