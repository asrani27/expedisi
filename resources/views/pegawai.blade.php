<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/demopegawai/add">tambah</a>
    <a href="/demopegawai/cetak">cetak</a>
    <table border=1>
    <tr>
    <th>nip</th>
    <th>nama_pegawai</th>
    <th>jabatan</th>
    <th>golongan</th>
    <th></th>
    </tr>
    @foreach($data as $item)
    
    <tr>
    <td>{{$item->nip}}</td>
    <td>{{$item->nama_pegawai}}</td>
    <td>{{$item->jabatan}}</td>
    <td>{{$item->golongan}}</td>
    <td>
    <a href="/demopegawai/edit/{{$item->id}}">edit</a> | 
    <a href="/demopegawai/delete/{{$item->id}}">delete</a>

    </td>
    </tr>
    @endforeach
    </table>

</body>
</html>