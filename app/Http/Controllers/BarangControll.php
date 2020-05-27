<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangControll extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bar = Barang::all();
        return view('barang.index',compact('bar'));
    }
     
    public function edit($id)
    {
       
        $bar = Barang::find($id);
        return view('barang.edit',compact('bar'));
    }

     public function create()
    {
        $ruangan = Barang::all();
        return view('barang.create',compact('tahun','ruangan'));
    }

    public function insert(Request $request)
    {
        $barang = new Barang;

        $barang->nama = $request->nama;

        $barang->save();

         return redirect('/barang')->with('response','Berhasil Di Simpan');
    }
    public function update(Request $request, $id)
    {

        $barang = Barang::find($id);

        $barang->nama = $request->nama;

        $barang->save();

         return redirect('/barang')->with('response','Berhasil Di Update');
    }   
     public function delete($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

         return redirect('/barang')->with('response','Berhasil Di Hapus');
    }
}
