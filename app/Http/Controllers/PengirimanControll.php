<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use App\User;
use App\Biaya;
use App\Barang;
use App\Kantor;
use App\Tracking;
use App\Pengiriman;
use App\V_pengiriman;
use App\DetailPengiriman;
use Illuminate\Http\Request;

class PengirimanControll extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang = Barang::all();
        return view('pengiriman.kirim',compact('kantor'));
    }

    public function reset($id)
    {
        $del = Pengiriman::find($id);
        $del_tracking = Tracking::where('resi',$del->resi)->get()->map(function($item){
            $item->delete();
            return $item;
        });

        $delete = $del->delete();

        return redirect('/pengiriman');
    }

    public function kirim()
    {
        $d = Auth::user()->id;
        // //dd($d);
        $user = User::where('id', $d)->with('roles')->first();
        foreach ($user->roles as $ur) {
        $kc = $ur->display_name;
        }
        //dd($kc);
        $barang = Barang::all();
        $semuatujuan = Kantor::all();
        $tujuan = Kantor::where('nama_kantor', '!=', $kc)->get();
        //dd($tujuan);
        $re = count(Pengiriman::all());
        $no_random = $re+125100001;
        return view('pengiriman.kirim',compact('barang','tujuan','no_random','semuatujuan'));
    }

    public function edit($id)
    {
       
        $kantor = Kantor::find($id);
        return view('kantor.edit',compact('kantor'));
    }

     public function create()
    {
        return view('kantor.create');
    }

     public function tambah(Request $request)
    {
        $br = Barang::find($request->barang_id);
        $total_berat = $request->berat * $request->unit;
        
        Cart::add($br->id, $br->nama, $total_berat, $request->biaya, ['unit' => $request->unit]);
        return back();
    }


   public function deletepengiriman($rowId ,$id)
    {
        $products = Cart::get($rowId);
        $baran = Barang::find($id);
        //$baran->stok = $baran->stok + $products->qty;
        //$baran->save();
        
        $barang = Barang::all();
        Cart::remove($rowId);
        return back();
    }
    public function insert(Request $request)
    {       
       $cekresi = Pengiriman::where('resi', $request->resi)->first();
       if($cekresi == null)
       {
        $pj = new Pengiriman;
        $pj->resi            = $request->resi;
        $pj->tujuan_id       = $request->tujuan_id;
        $pj->nama_pengirim   = $request->nama_pengirim;
        $pj->alamat_pengirim = $request->alamat_pengirim;
        $pj->telp_pengirim   = $request->telp_pengirim;
        $pj->nama_penerima   = $request->nama_penerima;
        $pj->alamat_penerima = $request->alamat_penerima;
        $pj->telp_penerima   = $request->telp_penerima;
        $pj->asal_kc         = $request->asal_kc;
        $pj->status          = 'Dalam Pengiriman';
        $pj->save();

        // Simpan Tracking
        $track = new Tracking;
        $track->resi    = $request->resi;
        $track->asal_kc = $request->asal_kc;
        $track->tujuan  = Kantor::find($request->tujuan_id)->nama_kantor;
        $track->status  = 'Dalam Pengiriman';
        $track->created_at = \Carbon\Carbon::createFromFormat('d/m/Y',$request->tgl)->format('Y-m-d');
        $track->save();
       }
        return redirect('/pengiriman/resi/'.$request->resi);
    }

    public function selesai(Request $req)
    {

       $products = Cart::content();
       $gt = (int)str_replace(',', '',Cart::subtotal());

       //Update Total Pengiriman 
       $p = Pengiriman::where('resi', $req->resi)->first();
       $p->total = $gt;
       $p->save();

       //Simpan Daftar Barang Yang Di Kirim
       foreach($products as $product){
             DetailPengiriman::insert([
                 'jenis_barang'  => $product->name,
                 'berat'         => $product->qty,
                 'jumlah'        => $product->options->unit,
                 'harga'         => $product->price,
                 'subtotal'      => $product->subtotal,
                 'pengiriman_id' => $p->id,
             ]);
         	}
        Cart::destroy();
        
       return redirect('/pengiriman/daftar')->with('response','Berhasil Di Simpan');
    }

    public function daftarkirim($resi)
    {
        $data = Pengiriman::where('resi', $resi)->first();
        $cekbiaya = Biaya::where('dari', $data->asal_kc)->where('ke', $data->tujuan->first()->nama_kantor)->first();
        if($cekbiaya == null){
             $biaya = 0;
        }else{
             $biaya = $cekbiaya->biaya;
        }
        
        $barang = Barang::all();

        return view('pengiriman.daftarkirim',compact('data','biaya','barang'));
    }

    public function daftarpengiriman()
    {
        $kc = Auth::user()->roles->first()->display_name;
        if($kc == 'Admin'){
            $pengiriman = Pengiriman::all();
        }else{
            $pengiriman = Pengiriman::all()->map(function($item, $key) use($kc){
                $item->kc_tujuan = $item->tujuan->first()->nama_kantor;
                return $item;
            })->where('kc_tujuan', $kc);
        }
        return view('pengiriman.daftar',compact('pengiriman'));
    }
    
    public function detail($id)
    {
    	//return 'test';
    	$dp = DetailPengiriman::where('pengiriman_id',$id)->get();
    	$p = Pengiriman::find($id);
    	//dd($dp);
         return view('pengiriman.detail',compact('dp','p'));
    }
    
    public function terima($id)
    {
        $dp = Pengiriman::find($id);
        $dp->status = 'Sudah Sampai';
        $dp->save();

        $track = new Tracking;
        $track->resi    = $dp->resi;
        $track->asal_kc = $dp->asal_kc;
        $track->tujuan  = $dp->tujuan->first()->nama_kantor;
        $track->status  = 'Sudah Sampai';
        $track->save();

        return back();
    }
    public function ambil($id)
    {
        $dp = Pengiriman::find($id);
        $dp->status = 'Telah Diterima';
        $dp->save();

        $track = new Tracking;
        $track->resi    = $dp->resi;
        $track->asal_kc = $dp->asal_kc;
        $track->tujuan  = $dp->tujuan->first()->nama_kantor;
        $track->status  = 'Telah Diterima';
        $track->save();
        
        return back();
    }
     public function delete($id)
    {
        $jab = Pengiriman::find($id);
        $datatrack = Tracking::where('resi', $jab->resi)->get();
        foreach($datatrack as $item)
        {
            $item->delete();
        }
        $jab->delete();

         return redirect('/pengiriman/daftar')->with('response','Berhasil Di Hapus');
    }
     public function penerimaan()
    { 
        if (Auth::user()->hasRole('admin'))
            {

        $pengiriman = V_pengiriman::all();
        return view('penerimaan.daftar',compact('pengiriman'));
            }
            else
            {

        $d = Auth::user()->id;
        
        $user = User::where('id', $d)->with('roles')->first();
        foreach ($user->roles as $ur) {
        $kc = $ur->display_name;
        }
        $pengiriman = V_pengiriman::where('nama_kantor',$kc)->get();
        return view('penerimaan.daftar',compact('pengiriman'));
            }
    }

     public function pengambilan()
    {if (Auth::user()->hasRole('admin'))
            {

        $pengiriman = V_pengiriman::all();
        return view('pengambilan.daftar',compact('pengiriman'));
}
            else
            {

        $d = Auth::user()->id;
        // //dd($d);
        $user = User::where('id', $d)->with('roles')->first();
        foreach ($user->roles as $ur) {
        $kc = $ur->display_name;
        }
    	$pengiriman = V_pengiriman::where('nama_kantor',$kc)->get();
        return view('pengambilan.daftar',compact('pengiriman'));
    }
    }
}
