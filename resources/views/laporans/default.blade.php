@extends('home')
@section('content')
<a href="{{route('laporan_pemesanans.harian')}}">
    <div class="col-lg-3 col-md-9">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h3>Laporan</h3>
                        <h3>Pemesanan</h3>
                    </div>                    
                </div>
            </div>            
        </div>
    </div>
</a>
                          
<a href="#">
    <div class="col-lg-3 col-md-9">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row"> 
                    <div class="col-xs-3">
                        <i class="fa fa-copy fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h3>Laporan</h3>
                        <h3>Pembelian</h3>
                    </div>                    
                </div>
            </div>            
        </div>
    </div>
</a>

<a href="#">
    <div class="col-lg-3 col-md-9">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h3>Laporan</h3>
                        <h3>Penjualan</h3>
                    </div>                    
                </div>
            </div>            
        </div>
    </div>
</a>

<a href="#">
    <div class="col-lg-3 col-md-9">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-th fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h3>Stok</h3>
                        <h3>Barang</h3>
                    </div>                    
                </div>
            </div>            
        </div>
    </div>
</a>
                                      
@endsection