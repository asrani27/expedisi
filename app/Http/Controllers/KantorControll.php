<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantor;

class KantorControll extends Controller
{
    	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kantor = Kantor::all();
        return view('kantor.index',compact('kantor'));
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

    public function insert(Request $request)
    {
        $kantor = new Kantor;

        $kantor->nama_kantor = $request->nama_kantor;

        $kantor->save();

         return redirect('/kantor')->with('response','Berhasil Di Simpan');
    }
    public function update(Request $request, $id)
    {

        $kantor = Kantor::find($id);

        $kantor->nama_kantor = $request->nama_kantor;

        $kantor->save();

         return redirect('/kantor')->with('response','Berhasil Di Update');
    }   
     public function delete($id)
    {
        $jab = Kantor::find($id);
        $jab->delete();

         return redirect('/kantor')->with('response','Berhasil Di Hapus');
    }
}
