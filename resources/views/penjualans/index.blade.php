@extends('home')
@section('content'){{ Session::get('message') }}

<div class="row">
 <div class="col-lg-12">
  <h1 class="page-header" align="center">
    Data Penjualan
  </h1>
<a href="{{route('penjualans.create')}}" class="pull-left btn btn-primary" id="create-penjualan" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Penjualan</th>
    		<th>Nota</th>
    		<th>Tanggal</th>
    		<th>Nama Pembeli</th>
        <th>Type Barang</th>
        <th>Qty</th>
        <th>Amount(Rp)</th>
        <th>Total(Rp)</th>
        <th>Action</th>
    	</tr>
    </thead>

    @foreach($penjualans as $penjualan)
    <tr>
       <td> {{ $penjualan->idpenjualan}} </td>
       <td> {{ $penjualan->nota}} </td>
       <td> {{ $penjualan->tgl}} </td>
       <td> {{ $penjualan->nama}} </td>
       <td> {{ $penjualan->type}} </td>
       <td> {{ $penjualan->qty}} </td>
       <td> {{ $penjualan->amount}} </td>
       <td> {{ $penjualan->total}} </td>
       <td>
         		<a href="/penjualans/{{$penjualan->idpenjualan}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
            <a href="/penjualans/{{$penjualan->idpenjualan}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>
@endforeach
</tbody>
</table>
          {!! $penjualans->links() !!} 
  </div>
  </div>  
@endsection