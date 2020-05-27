<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengiriman;
use App\Barang;
use App\Kantor;
use Cart;
use App\DetailPengiriman;
use App\V_pengiriman;
use Auth;
use App\User;

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
    	//dd($request->all());
    	$br = Barang::find($request->barang_id);
        Cart::add($br->id, $br->nama, $request->berat, 5000);
        return redirect('pengiriman');
    }


   public function deletepengiriman($rowId ,$id)
    {
        //dd($request->all());
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
       $products = Cart::content();
       $gt = (int)str_replace(',', '',Cart::total());
       
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
       $pj->total           = $gt;
       $pj->save();
	   
	   $id_pj = Pengiriman::orderBy('id','DESC')->first();
       $sid = (int)$id_pj->id;
       
        foreach($products as $product){
         DetailPengiriman::insert([
             'jenis_barang'  => $product->name,
             'jumlah'        => $product->qty,
             'harga'         => $product->price,
             'subtotal'      => $product->total,
             'pengiriman_id' => $sid,
         ]);
     		}
    		 Cart::destroy();
         return redirect('/pengiriman/daftar')->with('response','Berhasil Di Simpan');
    }

    public function daftarpengiriman()
    {
    	$pengiriman = V_pengiriman::all();
        return view('pengiriman.daftar',compact('pengiriman'));
    }
    
    public function detail($id)
    {
    	//return 'test';
    	$dp = DetailPengiriman::where('pengiriman_id',$id)->get();
    	$p = V_pengiriman::find($id);
    	//dd($dp);
         return view('pengiriman.detail',compact('dp','p'));
    }
    
    public function terima($id)
    {
        $dp = Pengiriman::find($id);
        $dp->status = 'Sudah Sampai';
        $dp->save();
        return back();
    }
    public function ambil($id)
    {
        $dp = Pengiriman::find($id);
        $dp->status = 'Telah Diterima';
        $dp->save();
        return back();
    }
     public function delete($id)
    {
        $jab = Pengiriman::find($id);
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
