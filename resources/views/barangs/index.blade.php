@extends('home')

@section('content')

<div class="row">
<h1>Data Barang</h1>
<a href="{{route('barangs.create')}}" class="pull-left btn btn-primary" id="create-barang" style="margin-right: 5px; margin-bottom: 20px">
  <i class="icon-plush icon-white"></i>Tambah Data</a><br><br><br>
<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped" id="tabelbarang">
    <thead>
    	<tr>
    		<th>ID Barang</th>
    		<th>Type Barang</th>
    		<th>Nama Barang</th>
    		<th>Price(Rp)</th>
    		<th>DPP(Rp)</th>
    		<th>PPN(Rp)</th>
    		<th>Stok Barang</th>
        <th>Action</th>
    	</tr>
      {{ csrf_field() }}
    </thead>

      @foreach($barangs as $barang)
      <tr class="item{{$barang->idbarang}}">
         <td> {{ $barang->idbarang}} </td>
         <td> {{ $barang->type}} </td>
         <td> {{ $barang->nama}} </td>
         <td> {{ $barang->price}} </td>
         <td> {{ $barang->dpp}} </td>
         <td> {{ $barang->ppn}} </td>
         <td> {{ $barang->stok}} </td>
         <td>
           		<a href="/barangs/{{$barang->idbarang}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;Edit</a>
              <a href="/barangs/{{$barang->idbarang}}" class="btn btn-danger" id="alertHapus"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a>
             <!-- <a href='#' data-id=' {$idbarang}' class='delete-it'>Delete</a> -->
      
         </td>
  </tr>
@endforeach
</tbody>
</table>
  {!! $barangs->links() !!} 
  </div>
</div> 
@endsection
