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
						CV.AMEXPRESS<br /></font></b>
					
					</td>
					<td width=100></td>
				</tr>
			</table>
			<div style="font-family:Arial; font-size:12px;">
				<center><h2>Laporan Data Petugas</h2></center>	
			</div>

			<table border="0">
			<tr>
			<td align="left" width="30%">
			</td>
			</tr>
			</table><br />
			<table class="tg">
			  <tr>s
              <th class="tg-3wr7">No</th>
              <th class="tg-3wr7">Nama</th>
              <th class="tg-3wr7">Alamat</th>
              <th class="tg-3wr7">Jabatan</th>
              <th class="tg-3wr7">Telp</th>
              <th class="tg-3wr7">Kantor</th>
			  </tr>
           
                  @php $no = 1; @endphp
                @foreach($lap6 as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->nama }}</td>
                  <td>{{ $mp->alamat }}</td>
                  <td>{{ $mp->nama_jabatan }}</td>
                  <td>{{ $mp->telp }}</td>
                  <td>{{ $mp->kantor }}</td>
                </tr>
                @endforeach
			  </table>
			 
			  <br />
			
		</body>
		<script>
			window.print();
		</script>
</html>