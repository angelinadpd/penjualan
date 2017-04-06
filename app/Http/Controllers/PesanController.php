<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pesan;
use App\Barang;
use App\Http\Controllers\Controller;
// use Ramsey\Uuid\Uuid;

class PesanController extends Controller
{
    public function index()
    {
        //$pesans = pesan::all();
        $pesans = DB::table('pesan')->leftjoin('barang', 'pesan.idbarang','=','barang.idbarang')
            ->select('pesan.idpesan','pesan.kode','pesan.noso','pesan.tgl','barang.nama','pesan.status')
            ->orderBy('idpesan', 'desc')
        	->paginate(5);  
        return view('pesans.index',compact('pesans'));                                          
    }

    public function create()
    {
       $barang=DB::table('barang')->get();
        return view('pesans.create',['barang'=>$barang]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'kode'      => 'required',
            'tgl'       => 'required',
            'idbarang'  => 'required',
        ]);

        $pesan = new pesan;
        $pesan->kode = $request->kode;
        $pesan->noso = str_random(8);
        $pesan->tgl = $request->tgl;
        $pesan->idbarang = $request->idbarang;
        $pesan->status = "Pesan";
        $pesan->save();

        return redirect()->route('pesans.index')
                        ->with('success','Create pesan barang sukses');
    }

    public function show($idpesan)
    {
        //$pesan=pesan::find($idpesan);
        $pesan = pesan::where('idpesan', '=',$idpesan);
        $pesan->delete();
        return redirect()->route('pesans.index')
        				->with('success','Hapus pesan barang sukses'); 
    }

    public function edit($pesan)
    {
        $barang= DB::table('barang')->get();
        $pesan=pesan::where('idpesan',$pesan)->first();
        if(!$pesan){
            abort(404);
        }
        return view('pesans.edit',[
            'pesan' => $pesan,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $idpesan)
    {
         $this->validate($request, [
            'kode'      => 'required',
            'tgl'       => 'required',
            'idbarang'  => 'required',
        ]);

       $pesan = pesan::where('idpesan', '=',$idpesan);

        $paramsUpdate = [
            'kode'      => $request->kode,
            'tgl'       => $request->tgl,
            'idbarang'  => $request->idbarang,
        ];
        
        $pesan->update($paramsUpdate);

       return redirect()->route('pesans.index')
        				->with('success','Edit pesan barang sukses');
    }

    // public function destroy($idpesan)
    // {
    //     $pesan = pesan::where('idpesan', '=',$idpesan);
    //     $pesan->delete();
    //     return redirect('pesan')->with('message','Hapus data sukses !');
    // }
}
