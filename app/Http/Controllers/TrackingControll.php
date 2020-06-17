<?php

namespace App\Http\Controllers;

use App\Tracking;
use App\Pengiriman;
use Illuminate\Http\Request;
use SweetAlert;

class TrackingControll extends Controller
{
    public function tracking(Request $req)
    {
        $data = Pengiriman::where('resi', $req->resi)->first();
        $track = Tracking::where('resi', $req->resi)->get();
        if($data == null){
            alert('DATA TIDAK DITEMUKAN')->persistent("Close this");
            return back();
        }else{
            return view('tracking',compact('data','track'));
        }
    }
}
