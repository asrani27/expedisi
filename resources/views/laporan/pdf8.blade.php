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
            CV.AMEXPRESS BANJARMASIN<br /></font></b>
          
          </td>
          <td width=100></td>
        </tr>
      </table>
      <div style="font-family:Arial; font-size:12px;">
        <center><h2>INVOICE RESI NO {{$lap8->resi}}</h2></center>  
      </div>

      <table border="0">
      <tr>
      <td width="50%">
        Nama Pengirim : {{$lap8->nama_pengirim}}
      </td>
      <td width="50%">
        Nama Penerima : {{$lap8->nama_penerima}}
      </td>
      </tr>
      </table><br />
      DETAIL BARANG YANG DI KIRIM
      <table class="tg">
        <tr>
          <th class="tg-3wr7">No<br></th>
          <th class="tg-3wr7">Jenis<br></th>
          <th class="tg-3wr7">Berat<br></th>
          <th class="tg-3wr7">Biaya<br></th>
          <th class="tg-3wr7">Subtotal<br></th>
        </tr>
              @php $no = 1; @endphp
              @foreach ($detail as $sis)
        <tr>
          <td align="center">{{$no++}}</td>
          <td align="center">{{$sis->jenis_barang}}</td>
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