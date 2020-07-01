<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/demopegawai/add">tambah Pegawai</a>
    <table border=1>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Golongan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->nip}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->jabatan}}</td>
                <td>{{$item->golongan}}</td>
                <td>
                <a href="/demopegawai/edit/{{$item->id}}">Edit</a> |
                <a href="/demopegawai/delete/{{$item->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>