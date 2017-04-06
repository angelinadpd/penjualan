@extends('home')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Pembeli</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pembelis.index') }}"> Back</a>
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
 
{{ Form::open(array('route' => 'pembelis.store','method'=>'POST')) }}
	<p>Nama Pembeli</p>
	<input type="text" name="nama" value="" required="" class="form-control">
	{{ ($errors->has('nama')) ? $errors->first('nama') : '' }}<br>

	<p>Alamat</p>
	<input type="text" name="alamat" value="" required="" class="form-control">
	{{ ($errors->has('alamat')) ? $errors->first('alamat') : '' }}<br>

	<p>Telp</p>
	<input type="text" name="telp" value="" required="" class="form-control">	{{ ($errors->has('telp')) ? $errors->first('telp') : '' }}<br>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-warning" type="reset" name="reset">Reset</button>
{{ Form::close() }}
@endsection