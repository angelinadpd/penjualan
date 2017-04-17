<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Realisasi;
use App\Pesan;
use App\Http\Controllers\Controller;

class RealisasiController extends Controller
{
    public function index()
    {
        //$realisasis = realisasi::all();
        $realisasis = DB::table('realisasi')->join('pesan', 'realisasi.idpesan','=','pesan.idpesan')
            ->select('realisasi.idrealisasi','realisasi.nodo','pesan.kode','pesan.tgl','realisasi.price','realisasi.qty','realisasi.total','realisasi.status')
            ->orderBy('idrealisasi', 'desc')
            ->paginate(5);  
        return view('realisasis.index',compact('realisasis'));  
    }

    public function create()
    {    
        $pesan= DB::table('pesan')
                                ->where('status', '!=', 'Masuk')
                                ->where('status', '!=', 'Batal')
                                ->get();
        return view('realisasis.create',['pesan'=>$pesan]);
    }

    public function store(Request $request)
    {
        $pesans=DB::table('pesan')
                        ->where('idpesan', '=',$request->idpesan)
                        ->update(['status' => $request->status]);

        $price = $request->price;
        $qty = $request->qty;
        $total = $price*$qty; 

        $this->validate($request, [
            'idpesan'    => 'required',
            'tgl'        => 'required',
            'price'      => 'required|numeric',
            'qty'        => 'required|numeric',
            'status'     => 'required',
        ]);    

        $realisasi = new realisasi;
        $realisasi->nodo    = str_random(8);
        $realisasi->idpesan = $request->idpesan;
        $realisasi->tgl     = $request->tgl;
        $realisasi->price   = $request->price;
        $realisasi->qty     = $request->qty;
        $realisasi->total   = $total;
        $realisasi->status  = $request->status;
        $realisasi->save();

        return redirect()->route('realisasis.index')
                        ->with('success','Create realisasi pemesanan sukses');
    }

    public function show($idrealisasi)
    {
        $realisasi = realisasi::where('idrealisasi', '=',$idrealisasi);
        $realisasi->delete();
        return redirect()->route('realisasis.index')
                        ->with('success','Hapus realisasi pemesanan sukses'); 
    }

    public function edit($realisasi)
    {
        //$realisasi=realisasi::find($idrealisasi);
        $pesan= DB::table('pesan')->get();
        $realisasi=realisasi::where('idrealisasi',$realisasi)->first();
        if(!$realisasi){
            abort(404);
        }
        return view('realisasis.edit',[
            'pesan' => $pesan,
            'realisasi' => $realisasi
        ]);
    }

    public function update(Request $request, $idrealisasi)
    {
        $price = $request->price;
        $qty = $request->qty;
        $total = $price*$qty;

         $this->validate($request, [
            'idpesan'    => 'required',
            'tgl'        => 'required',
            'price'      => 'required|numeric',
            'qty'        => 'required|numeric',
            'status'     => 'required',
            ]);

        $realisasi = realisasi::where('idrealisasi', '=',$idrealisasi);

        $paramsUpdate = [
        'idpesan'   => $request->idpesan,
        'tgl'       => $request->tgl,
        'price'     => $request->price,
        'qty'       => $request->qty,
        'total'     => $total,
        'status'    => $request->status,
    ];
        $realisasi->update($paramsUpdate);

        return redirect()->route('realisasis.index')
                        ->with('success','Update realisasi pemesanan sukses'); 
    }

    // public function destroy($idrealisasi)
    // {
    //     $realisasi = realisasi::where('idrealisasi', '=',$idrealisasi);
    //     $realisasi->delete();
    //     return redirect('realisasi')->with('message','Hapus data sukses !');
    // }
}
