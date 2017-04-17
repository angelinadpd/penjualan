@extends('home')
@section('content')

<div class="pull-left btn-group" data-toggle="buttons-radio">
  <a class="btn btn-primary" href="{{route('laporan_pemesanans.harian')}}">Harian</a>
  <a class="btn btn-primary" href="{{route('laporan_pemesanans.mingguan')}}">Mingguan</a>
  <a class="btn btn-primary" href="{{route('laporan_pemesanans.bulanan')}}">Bulanan</a>
  <a class="btn btn-primary" href="{{route('laporan_pemesanans.tahunan')}}">Tahunan</a>
  <a class="btn btn-primary" href="#">Rentang Waktu</a>
</div><br><br>
<div class="report-bar-right">
  <input style="width:160px;" id="date" name="date" type="date" required=""> 
  <button class="btn btn-success" type="submit" name="submit">Cari</button>     
</div><br><br>

<div class="table-responsive">
  <table class="table table-bordered table-hover tble-striped">
    <thead>
      <tr>
      <th>ID Laporan Pemesanan</th>
      <th>ID Pesan</th>
      <th>No. SO</th>
      <th>Tanggal Pesan</th>
      <th>ID Barang</th>
      <th>Type Barang</th>
      <th>Nama Barang</th>
      <th>Status</th>
    </tr>
    </thead>

    @foreach($laporan_pemesanans as $laporan_pemesanan)
    <tr>
       <td> {{ $laporan_pemesanan->idlaporan_pemesanan}} </td>
       <td> {{ $laporan_pemesanan->idpesan}} </td>
       <td> {{ $laporan_pemesanan->noso}} </td>
       <td> {{ $laporan_pemesanan->tgl}} </td>
       <td> {{ $laporan_pemesanan->idbarang}} </td>
       <td> {{ $laporan_pemesanan->type}} </td>
       <td> {{ $laporan_pemesanan->nama}} </td>
       <td> {{ $laporan_pemesanan->status}} </td>
    </tr>

@endforeach
</tbody>
</table>
        
  </div>  
@endsection
