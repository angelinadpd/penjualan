@extends('home')
@section('content')


<div class="row">
 <div class="col-lg-12">
  <h1 class="page-header" align="center">
    Data Realisasi Pemesanan
  </h1>
<a href="{{route('realisasis.create')}}" class="pull-left btn btn-primary" id="create-realisasi" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Realisasi</th>
    		<th>No.DO</th>
    		<th>ID Pesan</th>
        <th>Tanggal</th>
    		<th>Price(Rp)</th>
        <th>Qty</th>
        <th>Total(Rp)</th>
        <th>Status</th>
        <th>Action</th>
    	</tr>
    </thead>

    @foreach($realisasis as $realisasi)
    <tr>
       <td> {{ $realisasi->idrealisasi}} </td>
       <td> {{ $realisasi->nodo}} </td>
       <td> {{ $realisasi->kode}} </td>
       <td> {{ $realisasi->tgl}} </td>
       <td> {{ $realisasi->price}} </td>
       <td> {{ $realisasi->qty}} </td>
       <td> {{ $realisasi->total}} </td>
       <td> {{ $realisasi->status}} </td>
       <td>
         		<a href="/realisasis/{{$realisasi->idrealisasi}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
            <a href="/realisasis/{{$realisasi->idrealisasi}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>
@endforeach
</tbody>
</table>
          {!! $realisasis->links() !!} 
  </div>  
  </div>
@endsection