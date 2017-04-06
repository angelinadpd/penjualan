@extends('home')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Realisasi Pemesanan</h2>
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
 
{{ Form::open(array('route' => 'realisasis.store','method'=>'POST')) }}
	<p>ID Pesan</p>
	<select name="idpesan" class="form-control" required="">
		<option> --Pilih ID Pemesanan-- </option>
		@foreach($pesan as $pesan)
			<option value="{{ $pesan->idpesan }}"> {{ $pesan->kode }} </option>
		@endforeach
	</select>
	{{ ($errors->has('idpesan')) ? $errors->first('idpesan') : '' }}<br>

	<p>Tanggal</p>
	<input type="date" name="tgl" value="" required="" class="form-control">
	{{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}<br>

	<p>Price</p>
	<div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="price" value="" required="" class="form-control">
        <span class="input-group-addon">.00</span>
    </div>
	{{ ($errors->has('price')) ? $errors->first('price') : '' }}<br>

	<p>Qty</p>
	<input type="text" name="qty" value="" required="" class="form-control">
	{{ ($errors->has('qty')) ? $errors->first('qty') : '' }}<br>

	<p>Status</p>
		<select name="status" required="" class="form-control">
		<option> --Pilih status-- </option>
		<option> Masuk </option>
		<option> Batal </option>
	</select>
	{{ ($errors->has('status')) ? $errors->first('status') : '' }}<br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-warning" type="reset" name="reset">Reset</button>
{{ Form::close() }}
@endsection