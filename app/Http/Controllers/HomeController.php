<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Carbon\Carbon;
use App\Demopegawai;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
        
    }

    public function pegawai()
    {
        $data = Demopegawai::all();
        return view('pegawai',compact('data'));
    }

    public function add()
    {
        return view('tambah_pegawai');
    }
    
    public function simpan(Request $req)
    {
        $simpan = new Demopegawai;
        $simpan->nip          = $req->nip;
        $simpan->nama_pegawai = $req->nama_pegawai;
        $simpan->jabatan      = $req->jabatan;
        $simpan->golongan     = $req->golongan;
        $simpan->save();
        return redirect('/demopegawai');
    }

    public function edit($id)
    {
        $data = Demopegawai::find($id);
        return view('edit_pegawai',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        $simpan = Demopegawai::find($id);
        $simpan->nip          = $req->nip;
        $simpan->nama_pegawai = $req->nama_pegawai;
        $simpan->jabatan      = $req->jabatan;
        $simpan->golongan     = $req->golongan;
        $simpan->save();
        return redirect('/demopegawai');
    }

    public function delete($id)
    {
        $delete = Demopegawai::find($id)->delete();
        return back();
    }

    public function cetak()
    {
        $data = Demopegawai::all();
        return view('cetak_pegawai',compact('data'));
    }
}
