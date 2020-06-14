<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\Kantor;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function index()
    {
        $data = Biaya::all(); 
        return view('biaya.index',compact('data'));
    }
    
    public function create()
    {
        $kantor = Kantor::all();
        return view('biaya.create',compact('kantor'));
    }
    
    public function edit($id)
    {
        $kantor = Kantor::all();
        $data = Biaya::find($id);
        return view('biaya.edit',compact('data','kantor'));
    }
    
    public function delete($id)
    {
        $delete = Biaya::find($id)->delete();
        return back();
    }

    public function insert(Request $req)
    {
        $insert = new Biaya;
        $insert->dari = $req->dari;
        $insert->ke = $req->ke;
        $insert->biaya = $req->biaya;
        $insert->save();
        return redirect('/biaya');
    }
    
    public function update(Request $req, $id)
    {
        $update = Biaya::find($id);
        $update->dari = $req->dari;
        $update->ke = $req->ke;
        $update->biaya = $req->biaya;
        $update->save();
        return redirect('/biaya');
    }
}
