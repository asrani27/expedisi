<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
}
