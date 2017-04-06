<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pembeli;
use App\Http\Controllers\Controllers;
use Response;
use Validator;


class PembeliController extends Controller
{
    public function index()
    {
        //$pembelis = pembeli::all();
        $pembelis = pembeli::orderBy('idpembeli', 'desc')
        ->paginate(5); 
        return view('pembelis.index',compact('pembelis'));
    }

    public function create()
    {
       return view('pembelis.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'nama'          => 'required',
            'alamat'         => 'required',
            'telp'           => 'required|digits_between:8,12',
        ]);

        $pembeli = new pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->alamat = $request->alamat;
        $pembeli->telp = $request->telp;
        $pembeli->save();

        return redirect()->route('pembelis.index')
                        ->with('success','Create pembeli sukses');
    }

    public function show($idpembeli)//DELETE
    {
        $pembeli = pembeli::where('idpembeli', '=',$idpembeli);
        $pembeli->delete();
         return redirect()->route('pembelis.index')
        				->with('success','Hapus pembeli sukses');  
    }

    public function edit($pembeli)
    {
        $pembeli=pembeli::where('idpembeli',$pembeli)->first();
        if(!$pembeli){
            abort(404);
        }
        return view('pembelis.edit',compact('pembeli'));
    }
    public function update(Request $request, $idpembeli)
    {
         $this->validate($request, [
            'nama'          => 'required',
            'alamat'         => 'required',
            'telp'           => 'required|digits_between:8,12',
        ]);

       $pembeli = pembeli::where('idpembeli', '=',$idpembeli);

        $paramsUpdate = [
        'nama'   => $request->nama,
        'alamat'  => $request->alamat,
        'telp'    => $request->telp,
    ];
        $pembeli->update($paramsUpdate);

        return redirect()->route('pembelis.index')
        				->with('success','Edit pembeli sukses');  

    }

    // public function destroy($idpembeli)
    // {
    //     $pembeli = pembeli::where('idpembeli', '=',$idpembeli);
    //     $pembeli->delete();
    //     return redirect('pembeli')->with('message','Hapus data pembeli sukses !');
    // }
}
