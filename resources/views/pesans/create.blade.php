@extends('home')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Pesan Barang</h2>
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
 
{{ Form::open(array('route' => 'pesans.store','method'=>'POST')) }}
	<p>Kode</p>
	<input type="text" name="kode" value="" required="" class="form-control">
	{{ ($errors->has('kode')) ? $errors->first('kode') : '' }}<br>

	<p>Tanggal</p>
	<input type="date" name="tgl" value="" required="" class="form-control">
	{{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}<br>

	<p>Nama Barang</p>
	<select name="idbarang" required="" class="form-control">
		<option> --Pilih Nama Barang-- </option>
		@foreach($barang as $barang)
			<option value="{{ $barang->idbarang }}"> {{ $barang->nama }} </option>
		@endforeach
	</select>
    {{ ($errors->has('idbarang')) ? $errors->first('idbarang') : '' }}<br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-warning" type="reset" name="reset">Reset</button>
{{ Form::close() }}
@endsection