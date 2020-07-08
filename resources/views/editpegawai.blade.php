<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/demopegawai/edit/{{$data->id}}">
        {{csrf_field()}}
    nip <input type="text" name="nip" value="{{$data->nip}}"><br>
    Nama <input type="text" name="nama_pegawai" value="{{$data->nama_pegawai}}"><br>
    Jabatan <input type="text" name="jabatan" value="{{$data->jabatan}}"><br>
    Golongan <input type="text" name="golongan" value="{{$data->golongan}}"><br>
    <button type="submit">simpan</button>
    </form>
</body>
</html>