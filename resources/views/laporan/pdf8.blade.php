<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan</title>
  </head>
    <body>
      <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tgj  {border-collapse:collapse;border-spacing:0;width: 100%;}
        .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
        .tg .judul{font-family:"times new roman";}
      </style>

      <table class="tgj">
        <tr>
          <td width=100></td>
          <td align=center class="judul"><b><font size="5">
          	<img src="/logistic/assets/img/logo/loder.jpg">CV.AMEXPRESS<br /></font></b>
						Jl. Barito Hilir No.5, Telaga Biru, Kec. Banjarmasin Bar., Kota Banjarmasin, Kalimantan Selatan 70129
					</td>
          <td width=100></td>
        </tr>
      </table>
      <div style="font-family:Arial; font-size:12px;">
        <center><h2>INVOICE RESI NO {{$lap8->resi}}</h2></center>  
      </div>

      <table border="1" width="100%" cellpadding="5" cellspacing="0">
      <tr>
      <td width="40%">
        <b>DETAIL TUJUAN </b> 
      </td>
      <td width="30%">
        <b>DETAIL PENGIRIM </b>
      </td>
      <td width="30%">
        <b>DETAIL PENERIMA </b>
      </td>
      </tr>
      <tr>
        <td>
        <table>
          <tr>
            <td>Asal KC </td>
            <td>:</td>
            <td>{{$lap8->asal_kc}}</td>
          </tr>
          <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td>{{$lap8->tujuan->first()->nama_kantor}}</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{$lap8->created_at}}</td>
          </tr>
          <tr>
            <td>No RESI</td>
            <td>:</td>
            <td>{{$lap8->resi}}</td>
          </tr>
        </table>
        </td>
        <td>
        <table>
          <tr>
            <td>Nama Pengirim </td>
            <td>:</td>
            <td>{{$lap8->nama_pengirim}}</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$lap8->alamat_pengirim}}</td>
          </tr>
          <tr>
            <td>Telp</td>
            <td>:</td>
            <td>{{$lap8->telp_pengirim}}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
        </td>
        <td>
        <table>
          <tr>
            <td>Nama Penerima </td>
            <td>:</td>
            <td>{{$lap8->nama_penerima}}</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$lap8->alamat_penerima}}</td>
          </tr>
          <tr>
            <td>Telp</td>
            <td>:</td>
            <td>{{$lap8->telp_penerima}}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
        </td>
      </tr>
      </table><br />
      DETAIL BARANG YANG DI KIRIM
      <table class="tg">
        <tr>
          <th class="tg-3wr7">No<br></th>
          <th class="tg-3wr7">Jenis<br></th>
          <th class="tg-3wr7">Berat / Kg<br></th>
          <th class="tg-3wr7">Unit<br></th>
          <th class="tg-3wr7">Biaya / Kg<br></th>
          <th class="tg-3wr7">Subtotal<br></th>
        </tr>
              @php $no = 1; @endphp
              @foreach ($detail as $sis)
        <tr>
          <td align="center">{{$no++}}</td>
          <td align="center">{{$sis->jenis_barang}}</td>
          <td align="center">{{$sis->berat / $sis->jumlah}}</td>
          <td align="center">{{$sis->jumlah}}</td>
          <td align="center">Rp. {{format_uang($sis->harga)}}</td>
          <td align="center">Rp. {{format_uang($sis->subtotal)}}</td>
        </tr>
              @endforeach
        </table>
        <br />
      
    </body>
		<script>
			window.print();
		</script>
</html>