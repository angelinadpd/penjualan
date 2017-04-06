@extends('home')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
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
 
{{ Form::open(array('route' => 'barangs.store','method'=>'POST')) }}
    <p>Type Barang</p>
    <input type="text" name="type" value="" required="" class="form-control">
    {{ ($errors->has('type'))? $errors->first('type') : '' }}<br>
    
    <p>Nama Barang</p>
    <input type="text" name="nama" value="" required="" class="form-control">
    {{ ($errors->has('nama'))? $errors->first('nama') : '' }}<br>

    <p>Price</p>
    <div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" name="price" value="" required="" class="form-control">
        <span class="input-group-addon">.00</span>
    </div>
    {{ ($errors->has('price'))? $errors->first('price') : '' }}

    <p>Stok</p>
    <input type="text" name="stok" value="" required="" class="form-control">
    {{ ($errors->has('stok'))? $errors->first('stok') : '' }}<br><br>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-success" type="submit" name="submit">Post</button>
    <button class="btn btn-warning" type="reset" name="reset">Reset</button>
{{ Form::close() }}


@endsection