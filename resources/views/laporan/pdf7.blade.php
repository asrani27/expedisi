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
				<center><h2>Laporan Data Tarif Pengiriman</h2></center>	
			</div>

			<table border="0">
			<tr>
			<td align="left" width="30%">
			</td>
			</tr>
			</table><br />
			<table class="tg">
			  <tr>
              <th class="tg-3wr7">No</th>
              <th class="tg-3wr7">Tanggal</th>
              <th class="tg-3wr7">No Resi</th>
              <th class="tg-3wr7">Jumlah Tarif</th>
              <th  class="tg-3wr7">Asal KC</th>
              <th  class="tg-3wr7">Tujuan KC</th>
			  </tr>
           
                @php $no = 1; @endphp
                @foreach($lap7 as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->created_at }}</td>
                  <td>{{ $mp->resi }}</td>
                  <td alig="center">{{ format_uang($mp->total) }}</td>
                  <td>{{ $mp->asal_kc }}</td>
                  <td>{{ $mp->tujuan->first()->nama_kantor }}</td>
                </tr>
                @endforeach
			  </table>
			 
			  <br />
			
		</body>
		<script>
			window.print();
		</script>
</html>