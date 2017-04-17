@extends('home')
@section('content')

<div class="row">
 <div class="col-lg-12">
  <h1 class="page-header" align="center">
    Data Pemesanan
  </h1>
<a href="{{route('pesans.create')}}" class="pull-left btn btn-primary" id="create-pesan" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
    		<th>ID Pemesanan</th>
    		<th>Kode Pesan</th>
    		<th>No. SO</th>
    		<th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Status</th>
        <th>Action</th>
    	</tr>
    </thead>

    @foreach($pesans as $pesan)
    <tr>
       <td> {{ $pesan->idpesan}} </td>
       <td> {{ $pesan->kode}} </td>
       <td> {{ $pesan->noso}} </td>
       <td> {{ $pesan->tgl}} </td>
       <td> {{ $pesan->nama}} </td>
       <td> {{ $pesan->status}} </td>
       <td>
         		<a href="/pesans/{{$pesan->idpesan}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
            <a href="/pesans/{{$pesan->idpesan}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
        </td>
      </tr>

@endforeach
</tbody>
</table>
          {!! $pesans->links() !!} 
  </div>
  </div>  
@endsection