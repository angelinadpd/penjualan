<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang;
use App\Http\Controllers\Controllers;
use Response;
use Validator;

class BarangController extends Controller
{
    public function index()
    {
        //$barangs = barang::all();
        $barangs = barang::orderBy('idbarang', 'desc')
        ->paginate(5);  
        return view('barangs.index',compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $price = $request->price;
        $ppn = $price*0.1;
        $dpp = $price+$ppn;

	    $this->validate($request, [
	         'type' => 'required',
	         'nama' => 'required',
	         'price'=> 'required|numeric',
	         //'dpp'  => 'required',
	         //'ppn'  => 'required',
	         'stok' => 'required|numeric',
	    ]);

	        $barang = new barang;
	        $barang->type   = $request->type;
	        $barang->nama   = $request->nama;
	        $barang->price  = $request->price;
	        $barang->dpp    = $dpp;
	        $barang->ppn    = $ppn;
	        $barang->stok   = $request->stok;
	        $barang->save();

        return redirect()->route('barangs.index')
                        ->with('success','Create barang sukses');
    }

    public function show($idbarang)//DELETE
    {
        
        $barang = barang::where('idbarang', '=',$idbarang);
        $barang->delete();
        return redirect()->route('barangs.index')
        				->with('success','Hapus data barang sukses');  
    }

    public function edit($barang)
    {
        //$barang=barang::find($idbarang);
        $barang=barang::where('idbarang',$barang)->first();
        if(!$barang){
            abort(404);
        }
        return view('barangs.edit',compact('barang'));
    }

    public function update(Request $request, $idbarang)
    {
        $price = $request->price;
        $ppn = $price*0.1;
        $dpp = $price+$ppn;

        $this->validate($request, [
         'type' => 'required',
         'nama' => 'required',
         'price'=> 'required|numeric',
         //'dpp'  => 'required',
         //'ppn'  => 'required',
         'stok' => 'required|numeric',
    ]);
        $barang = barang::where('idbarang', '=',$idbarang);

	    $paramsUpdate = [
		'type'   => $request->type,
		'nama'   => $request->nama,
		'price'  => $request->price,
		'dpp'    => $dpp,
		'ppn'    => $ppn,
		'stok'   => $request->stok,
	];
        $barang->update($paramsUpdate);

        return redirect()->route('barangs.index')
        				->with('success','Edit data barang sukses');  
    }

    // public function destroy($idbarang)
    // {
    //     $barang = barang::where('idbarang', '=',$idbarang);
    //     $barang->delete();
    //     Session::flash('message', 'Data Berhasil Dihapus');
    //     return redirect('barang')->with('message','Hapus data barang sukses !'); 
    // }

}
    