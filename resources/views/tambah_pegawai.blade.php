<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/demopegawai/add">
        {{ csrf_field() }}
        
        NIP: <input type="text" name="nip"> <br>
        Nama: <input type="text" name="nama_pegawai"> <br>
        Jabatan: <input type="text" name="jabatan"> <br>
        Golongan: <input type="text" name="golongan"> <br>
        <button type="submit">simpan</button>
    </form>
    
</body>
</html>