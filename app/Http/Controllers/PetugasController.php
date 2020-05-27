<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Jabatan;
use App\Kantor;
use App\v_petugas;


class PetugasController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $petugas = v_petugas::all();
        return view('petugas.index',compact('petugas'));
    }
     
    public function edit($id)
    {
       
        $kantor = Kantor::all();
        $jabatan = Jabatan::all();
        $petugas = Petugas::find($id);
        return view('petugas.edit',compact('petugas','jabatan','kantor'));
    }

     public function create()
    {
        $kantor = Kantor::all();
        $jabatan = Jabatan::all();
        return view('petugas.create',compact('jabatan','kantor'));
    }

    public function insert(Request $request)
    {
        //dd($request->all());
        $petugas = new Petugas;

        $petugas->nama = $request->nama;
        $petugas->alamat = $request->alamat;
        $petugas->jkel = $request->jkel;
        $petugas->telp = $request->telp;
        $petugas->kantor = $request->kantor;
        $petugas->jabatan_id = $request->jabatan_id;

        $petugas->save();

         return redirect('/petugas')->with('response','Berhasil Di Simpan');
    }
    public function update(Request $request, $id)
    {

        $petugas = Petugas::find($id);

        $petugas->nama = $request->nama;
        $petugas->alamat = $request->alamat;
        $petugas->jkel = $request->jkel;
        $petugas->telp = $request->telp;
        $petugas->kantor = $request->kantor;
        $petugas->jabatan_id = $request->jabatan_id;

        $petugas->save();

         return redirect('/petugas')->with('response','Berhasil Di Update');
    }   
     public function delete($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();

         return redirect('/petugas')->with('response','Berhasil Di Hapus');
    }
}
