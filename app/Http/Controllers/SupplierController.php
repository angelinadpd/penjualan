<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\supplier;
use App\Http\Controllers\Controllers;
use Response;
use Validator;


class SupplierController extends Controller
{
     public function index()
    {
        //$suppliers = supplier::all();
        $suppliers = supplier::orderBy('idsupplier', 'desc')
        ->paginate(5); 
        return view('suppliers.index',compact('suppliers'));
    }

    public function create()
    {
       return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'          => 'required',
            'alamat'         => 'required',
            'telp'           => 'required|digits_between:8,12',
        ]);

        $supplier = new supplier;
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telp = $request->telp;
        $supplier->save();

        return redirect()->route('suppliers.index')
                        ->with('success','Create supplier sukses');
    }

    public function show($idsupplier)
    {
        $supplier = supplier::where('idsupplier', '=',$idsupplier);
        $supplier->delete();
        return redirect()->route('suppliers.index')
        				->with('success','Hapus supplier sukses'); 
    }

    public function edit($supplier)
    {
        $supplier=supplier::where('idsupplier',$supplier)->first();
        if(!$supplier){
            abort(404);
        }
        return view('suppliers.edit',compact('supplier'));
    }

    public function update(Request $request, $idsupplier)
    {
         $this->validate($request, [
            'nama'          => 'required',
            'alamat'         => 'required',
            'telp'           => 'required|digits_between:8,12',
            ]);

        $supplier = supplier::where('idsupplier', '=',$idsupplier);

        $paramsUpdate = [
        'nama'   => $request->nama,
        'alamat'  => $request->alamat,
        'telp'    => $request->telp,
    ];
        $supplier->update($paramsUpdate);

        return redirect()->route('suppliers.index')
        				->with('success','Edit supplier sukses');  
    }

    // public function destroy($idsupplier)
    // {
    //     $supplier = supplier::where('idsupplier', '=',$idsupplier);
    //     $supplier->delete();
    //     return redirect('supplier')->with('message','Hapus data sukses !');
    // }
}
