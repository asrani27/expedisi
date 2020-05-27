<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aset;
use App\ViewAset;
use App\Tahun;
use App\Ruangan;

class AsetControll extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aset = ViewAset::all();
        return view('aset.index',compact('aset'));
    }
     
    public function edit($id)
    {
       
        $aset = Aset::find($id);
        $ruangan = Ruangan::all();
        $viewaset = ViewAset::find($id);
        return view('aset.edit',compact('aset','ruangan','viewaset'));
    }

     public function create()
    {
        $tahun = Tahun::where('tahun_aktif','1')->first();
        $ruangan = Ruangan::all();
        return view('aset.create',compact('tahun','ruangan'));
    }

    public function insert(Request $request)
    {
         // $this->validate($request,[
         //    'jumlah' => 'required|max:11|numeric',
         //    'harga_satuan' => 'required|max:11|numeric'
         //    ]);

        //dd($request->all());
        $tglbeli = $request->tgl_beli;
        $explode = explode('/', $tglbeli);
        $day = $explode[0];
        $month = $explode[1];
        $year = $explode[2];
        $extglbeli = ($year."-".$month."-".$day);
        //dd($extglbeli);
        
        $jml = (int)$request->jumlah;
        $hs = (int)$request->harga_satuan;
        $rusak = (int)$request->rusak;
        $baik = (int)$request->baik;
        $total = $jml * $hs;
        //dd($total);

        $aset = new Aset;

        $aset->nama_barang = $request->nama_barang;
        $aset->tgl_beli = $extglbeli;
        $aset->merk = $request->merk;
        $aset->bahan = $request->bahan;
        $aset->jumlah = $jml;
        $aset->harga_satuan = $hs;
        $aset->total = $total;
        $aset->rusak = $rusak;
        $aset->baik = $baik;
        $aset->ruangan_id = $request->ruangan_id;
        $aset->tahun_ajaran = $request->tahun_ajaran;

        $aset->save();

         return redirect('/aset')->with('response','Berhasil Di Simpan');
    }
    public function update(Request $request, $id)
    {

        $tglbeli = $request->tgl_beli;
        $explode = explode('/', $tglbeli);
        $day = $explode[0];
        $month = $explode[1];
        $year = $explode[2];
        $extglbeli = ($year."-".$month."-".$day);
        //dd($extglbeli);
        
        $jml = (int)$request->jumlah;
        $hs = (int)$request->harga_satuan;
        $rusak = (int)$request->rusak;
        $baik = (int)$request->baik;
        $total = $jml * $hs;
        //dd($total);

        $aset = Aset::find($id);

        $aset->nama_barang = $request->nama_barang;
        $aset->tgl_beli = $extglbeli;
        $aset->merk = $request->merk;
        $aset->bahan = $request->bahan;
        $aset->jumlah = $jml;
        $aset->harga_satuan = $hs;
        $aset->total = $total;
        $aset->rusak = $rusak;
        $aset->baik = $baik;
        $aset->ruangan_id = $request->ruangan_id;
        $aset->tahun_ajaran = $request->tahun_ajaran;

        $aset->save();

         return redirect('/aset')->with('response','Berhasil Di Update');
    }   
     public function delete($id)
    {
        $aset = Aset::find($id);
        $aset->delete();

         return redirect('/aset')->with('response','Berhasil Di Hapus');
    }
}
