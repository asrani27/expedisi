<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;

class JabatanControll extends Controller
{ 
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jab = Jabatan::all();
        return view('jabatan.index',compact('jab'));
    }
     
    public function edit($id)
    {
       
        $jab = Jabatan::find($id);
        return view('jabatan.edit',compact('jab'));
    }

     public function create()
    {
        return view('jabatan.create');
    }

    public function insert(Request $request)
    {
        $jab = new Jabatan;

        $jab->nama_jabatan = $request->nama;

        $jab->save();

         return redirect('/jabatan')->with('response','Berhasil Di Simpan');
    }
    public function update(Request $request, $id)
    {

        $jab = Jabatan::find($id);

        $jab->nama_jabatan = $request->nama;

        $jab->save();

         return redirect('/jabatan')->with('response','Berhasil Di Update');
    }   
     public function delete($id)
    {
        $jab = Jabatan::find($id);
        $jab->delete();

         return redirect('/jabatan')->with('response','Berhasil Di Hapus');
    }
}
