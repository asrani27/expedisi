<?php

namespace App\Http\Controllers;

use PDF;
use Carbon;
use App\Kantor;
use App\Petugas;
use App\V_petugas;
use App\Pengiriman;
use App\V_pengiriman;
use App\DetailPengiriman;
use Illuminate\Http\Request;

class LaporanControll extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

    public function index1()
    {   
        $tujuan = Kantor::all();
    	$pengiriman = V_pengiriman::all();
        return view('laporan.index1',compact('pengiriman','tujuan'));
    }
     
    public function cetak1(Request $request)
    {
        
    $tglmulai = $request->tgl_mulai;
    $explode = explode('/', $tglmulai);
    $day = $explode[0];
    $month = $explode[1];
    $year = $explode[2];
    $extglmulai = ($year."-".$month."-".$day)." 00:00:00";

    $tglakhir = $request->tgl_akhir;
    $explode = explode('/', $tglakhir);
    $day = $explode[0];
    $month = $explode[1];
    $year = $explode[2];
    $extglakhir = ($year."-".$month."-".$day)." 23:59:59";
            $no = rand(0,10000);
            $tgl = Carbon\Carbon::now()->format('d M Y');
    	    $lap1 = Pengiriman::where('asal_kc',$request->asal_kc)->whereBetween('created_at', array($extglmulai, $extglakhir))->get();
            //$pdf = PDF::loadView('laporan.pdf1', compact('lap1'));
    //dd($lap1);
    return view('laporan.pdf1', compact('lap1'));
    //return $pdf->download($no.'lap1'.date("Y-m-D-H:m:s").'.pdf');
    
    } 
    
    public function index2()
    {
        $tujuan = Kantor::all();
    	$pengiriman = V_pengiriman::where('status','Sudah Sampai')->get();
        return view('laporan.index2',compact('pengiriman','tujuan'));
    }

       public function cetak2(Request $request)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
    	$lap2 = V_pengiriman::where('status','Sudah Sampai')->where('nama_kantor',$request->tujuan_kc)->get();

        return view('laporan.pdf2', compact('lap2'));
    // $pdf = PDF::loadView('laporan.pdf2', compact('lap2'));
    // return $pdf->download($no.'lap2'.date("Y-m-D-H:m:s").'.pdf');
    
    } 

    public function index3()
    {
        $tujuan = Kantor::all();
    	$pengiriman = V_pengiriman::where('status','Telah Diterima')->get();
        return view('laporan.index3',compact('pengiriman','tujuan'));
    }

    public function cetak3(Request $request)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
    	$lap3 = V_pengiriman::where('status','Telah Diterima')->where('nama_kantor',$request->tujuan_kc)->get();
        return view('laporan.pdf3', compact('lap3'));
        //$pdf = PDF::loadView('laporan.pdf3', compact('lap3'));
        //return $pdf->download($no.'lap3'.date("Y-m-D-H:m:s").'.pdf');
    } 

      public function cetak3belumlunas(Request $request)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
    //dd($mapel);
    
    $lap3 = DB::select('SELECT
        pelanggan.nama,
        penjualan.jenis_pembayaran,
        penjualan.nota,
        penjualan.grandtotal,
        pelanggan.alamat,
        pelanggan.telp,
        penjualan.status
        FROM
        penjualan
        INNER JOIN pelanggan ON penjualan.pelanggan_id = pelanggan.id WHERE penjualan.status = "Belum Lunas"
                '); 
    //$dp = DetailPenjualan::all(); 
    //dd($lap1);

    $pdf = PDF::loadView('laporan.pdf3belumlunas', compact('lap3'));
    //return view('laporan.index1', compact('nilai','sem','mapel','kelas','th','nama_wk'));
    return $pdf->download($no.'lap3belumlunas'.date("Y-m-D-H:m:s").'.pdf');
    } 

    public function index4()
    {
        $tujuan = Kantor::all();
    	$pengiriman = V_pengiriman::all();
        return view('laporan.index4',compact('pengiriman','tujuan'));
    }

       public function cetak4(Request $request)
    {
        //dd($id);
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
    	$lap4 = V_pengiriman::where('asal_kc',$request->asal_kc)->get();
        return view('laporan.pdf4', compact('lap4'));
    // $pdf = PDF::loadView('laporan.pdf4', compact('lap4'));
    // return $pdf->download($no.'lap4'.date("Y-m-D-H:m:s").'.pdf');
    } 


    public function index5()
    {

        $tujuan = Kantor::all();
    	$pengiriman = V_pengiriman::all();
        return view('laporan.index5',compact('pengiriman','tujuan'));
    }

      public function cetak5(Request $request)
    {
        $no = rand(0,10000);
    	$lap5 = V_pengiriman::where('nama_kantor',$request->tujuan_kc)->get();
        $tgl = Carbon\Carbon::now()->format('d M Y');
  
        return view('laporan.pdf5', compact('lap5'));
    //     $pdf = PDF::loadView('laporan.pdf5', compact('lap5'));
    // return $pdf->download($no.'lap5'.date("Y-m-D-H:m:s").'.pdf');
    
    } 
    public function index6()
    {
       
        $tujuan = Kantor::all();
        $lap6 = V_petugas::all();
        //dd($lap6);
        return view('laporan.index6',compact('lap6','tujuan'));
    }
    
    public function cetak6(Request $request)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
        $lap6 = V_petugas::where('kantor',$request->kantor)->get();
        
        return view('laporan.pdf6', compact('lap6'));
            // $pdf = PDF::loadView('laporan.pdf6', compact('lap6'));
            // return $pdf->download($no.'lap6'.date("Y-m-D-H:m:s").'.pdf');
    }

    public function index7()
    { 
        $tujuan = Kantor::all();
    	$pengiriman = V_pengiriman::all();
        return view('laporan.index7',compact('pengiriman','tujuan'));
    }
    
    public function cetak7(Request $request)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
        //dd($request->nip);
         $lap7 = Pengiriman::where('asal_kc',$request->asal_kc)->get();
         return view('laporan.pdf7', compact('lap7'));
        // $pdf = PDF::loadView('laporan.pdf7', compact('lap7'));
        // return $pdf->download($no.'lap7'.date("Y-m-D-H:m:s").'.pdf');
    } 

    public function index8()
    {

         $lap8 = V_pengiriman::all();
        return view('laporan.index8',compact('lap8'));
    }
     
  public function cetak8(Request $request, $id)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
        
        $lap8 = V_pengiriman::find($id);
        $detail = DetailPengiriman::where('pengiriman_id',$id)->get();
        return view('laporan.pdf8', compact('lap8','detail'));
    // $pdf = PDF::loadView('laporan.pdf8', compact('lap8','detail'));
    // return $pdf->download($no.'lap8'.date("Y-m-D-H:m:s").'.pdf');
    
    } 

     public function index9()
    { 
        $tujuan = Kantor::all();
        $pengiriman = V_pengiriman::all();
        return view('laporan.index9',compact('pengiriman','tujuan'));
    }
    
    public function cetak9(Request $request)
    {
        $no = rand(0,10000);
        $tgl = Carbon\Carbon::now()->format('d M Y');
        
         $lap9 = V_pengiriman::where('asal_kc',$request->asal_kc)->get();
         return view('laporan.pdf9', compact('lap9'));
        // $pdf = PDF::loadView('laporan.pdf9', compact('lap9'));
        // return $pdf->download($no.'lap9'.date("Y-m-D-H:m:s").'.pdf');
    } 
}
