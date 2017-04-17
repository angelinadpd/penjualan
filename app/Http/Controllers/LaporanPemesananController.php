<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang;
use App\Pesan;
use App\Http\Controllers\Controllers;
use Response;
use Validator;

class LaporanPemesananController extends Controller
{
	public function index() {
	    //$laporan_pemesanans = laporan_pemesanan::all();
	    $laporan_pemesanans = DB::table('laporan_pemesanan')
	    	->leftjoin('barang', 'laporan_pemesanan.idbarang','=','barang.idbarang')
	    	->leftjoin('pesan', 'laporan_pemesanan.idpesan','=','pesan.idpesan')
	        ->select('laporan_pemesanan.idlaporan_pemesanan','laporan_pemesanan.date','pesan.kode','pesan.noso','pesan.tgl','pesan.idbarang','barang.type','barang.nama','pesan.status')
	        ->orderBy('idlaporan_pemesanan', 'desc')
	      	->paginate(50);  
	    return view('laporan_pemesanans.index',compact('laporan_pemesanans'));  
	}

	public function harian() {
		$laporan_pemesanans = DB::table('laporan_pemesanan')
			->join('barang', 'laporan_pemesanan.idbarang','=','barang.idbarang')
	    	->join('pesan', 'laporan_pemesanan.idpesan','=','pesan.idpesan')
	        ->select('laporan_pemesanan.idlaporan_pemesanan','laporan_pemesanan.date','pesan.kode','pesan.noso','pesan.tgl','pesan.idbarang','barang.type','barang.nama','pesan.status')
	        ->orderBy('idlaporan_pemesanan', 'desc')
	        ->paginate(50);
	    return view('laporan_pemesanans.harian',compact('laporan_pemesanans'));    
	} 

	public function mingguan() {
		$laporan_pemesanans= DB::table('laporan_pemesanan')->get();
		$pesan= DB::table('pesan')->get();
		$barang= DB::table('barang')->get();

		return view('laporan_pemesanans.mingguan',compact('laporan_pemesanans'));  
		
	}

	public function bulanan() {
		$laporan_pemesanans= DB::table('laporan_pemesanan')->get();
		$pesan= DB::table('pesan')->get();
		$barang= DB::table('barang')->get();

		return view('laporan_pemesanans.bulanan',compact('laporan_pemesanans'));  
		
	}

	public function tahunan( ) {
		$laporan_pemesanans= DB::table('laporan_pemesanan')->get();
		$pesan= DB::table('pesan')->get();
		$barang= DB::table('barang')->get();

		return view('laporan_pemesanans.tahunan',compact('laporan_pemesanans'));  
		
	}
}
