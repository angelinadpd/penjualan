<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Penjualan;
use App\Pembeli;
use App\Barang;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    public function index()
    {
        //$penjualans = penjualan::all();
        $penjualans = DB::table('penjualan')->leftjoin('pembeli', 'penjualan.idpembeli','=','pembeli.idpembeli')
            ->leftjoin('barang', 'penjualan.idbarang','=','barang.idbarang')
            ->select('penjualan.idpenjualan','penjualan.nota','penjualan.tgl','pembeli.nama','barang.type','penjualan.qty','penjualan.amount','penjualan.total')
            ->orderBy('idpenjualan', 'desc')
            ->paginate(5);
        return view('penjualans.index',compact('penjualans'));   
    }

    public function create()
    {
        $pembeli= DB::table('pembeli')->get();
        $barang= DB::table('barang')->get();
        return view('penjualans.create',['barang'=>$barang],['pembeli'=>$pembeli]);
    }

    public function store(Request $request)
    {
        $qty = $request->qty;
        $amount = $request->amount;
        $total = $amount*$qty;

        $this->validate($request, [
            'tgl'         => 'required',
            'idpembeli'   => 'required',
            'idbarang'    => 'required',
            'qty'         => 'required|numeric',
            'amount'      => 'required|numeric',
            //'total'       => 'required',
        ]);

        $penjualan = new penjualan;
        $penjualan->nota = str_random(8);
        $penjualan->tgl = $request->tgl;
        $penjualan->idpembeli = $request->idpembeli;
        $penjualan->idbarang = $request->idbarang;
        $penjualan->qty = $request->qty;
        $penjualan->amount = $request->amount;
        $penjualan->total = $total;
        $penjualan->save();

        return redirect()->route('penjualans.index')
                        ->with('success','Create penjualan sukses');
    }

    public function show($idpenjualan)
    {
       $penjualan = penjualan::where('idpenjualan', '=',$idpenjualan);
       $penjualan->delete();
       return redirect()->route('penjualans.index')
                        ->with('success','Hapus penjualan sukses');
    }

    public function edit($penjualan)
    {
        //$penjualan=penjualan::find($idpenjualan);
        $pembeli= DB::table('pembeli')->get();
        $barang= DB::table('barang')->get();
        $penjualan=penjualan::where('idpenjualan',$penjualan)->first();
        if(!$penjualan){
            abort(404);
        }
        return view('penjualans.edit',[
            'penjualan' => $penjualan,
            'pembeli' => $pembeli,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $idpenjualan)
    {
        $qty = $request->qty;
        $amount = $request->amount;
        $total = $qty*$amount;

         $this->validate($request, [
            'tgl'         => 'required',
            'idpembeli'   => 'required',
            'idbarang'    => 'required',
            'qty'         => 'required|numeric',
            'amount'      => 'required|numeric',
            //'total'       => 'required',
            ]);

       $penjualan = penjualan::where('idpenjualan', '=',$idpenjualan);

        $paramsUpdate = [
        'tgl'       => $request->tgl,
        'idpembeli' => $request->idpembeli,
        'idbarang'  => $request->idbarang,
        'qty'       => $request->qty,
        'amount'    => $request->amount,
        'total'     => $total,
    ];
        $penjualan->update($paramsUpdate);

        return redirect()->route('penjualans.index')
        				->with('success','Edit penjualan sukses');
    }

    // public function destroy($idpenjualan)
    // {
    //     $penjualan = penjualan::where('idpenjualan', '=',$idpenjualan);
    //     $penjualan->delete();
    //     return redirect('penjualan')->with('message','Hapus data sukses !');
    // }
}
