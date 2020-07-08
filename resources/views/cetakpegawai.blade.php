<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
    <tr>
    <th>nip</th>
    <th>nama_pegawai</th>
    <th>jabatan</th>
    <th>golongan</th>
    </tr>
    @foreach($data as $item)
    
    <tr>
    <td>{{$item->nip}}</td>
    <td>{{$item->nama_pegawai}}</td>
    <td>{{$item->jabatan}}</td>
    <td>{{$item->golongan}}</td>
    </tr>
    @endforeach
    </table>

    <script>
        window.print();
    </script>
</body>
</html>