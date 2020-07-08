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

    public function demopegawai()
    {
        $data = \App\Demopegawai::all();
        return view('pegawai',compact('data'));
    }
    
    public function tambahpegawai()
    {
        return view('tambahpegawai');
    }
    
    public function simpanpegawai(Request $req)
    {
        $s = new \App\Demopegawai;
        $s->nip = $req->nip;
        $s->nama_pegawai = $req->nama_pegawai;
        $s->jabatan = $req->jabatan;
        $s->golongan = $req->golongan;
        $s->save();
        return redirect('/demopegawai');
    }
    
    public function editpegawai($id)
    {
        $data = \App\Demopegawai::find($id);
        return view('editpegawai',compact('data'));
    }
    
    public function updatepegawai(Request $req, $id)
    {
        $s = \App\Demopegawai::find($id);
        $s->nip = $req->nip;
        $s->nama_pegawai = $req->nama_pegawai;
        $s->jabatan = $req->jabatan;
        $s->golongan = $req->golongan;
        $s->save();
        return redirect('/demopegawai');
    }
    
    public function deletepegawai($id)
    {
        $s = \App\Demopegawai::find($id)->delete();
        return back();
    }

    public function cetakpegawai()
    {
        $data = \App\Demopegawai::all();
        return view('cetakpegawai',compact('data'));
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
