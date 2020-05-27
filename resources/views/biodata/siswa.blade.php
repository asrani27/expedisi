@extends('layouts.date')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Biodata Siswa</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @foreach ($siswa as $sis)
   <div class="row invoice-info">
      {{-- expr --}}
        <div class="col-sm-3 invoice-col"><center>
          @if ($sis->foto == NULL)
            tidak ada foto
            @else
          <img class="img-circle" src="/storage/files/{{$sis->foto}}" alt="User Avatar" width="200px" height="200"></center> 
          @endif
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <address>
            <strong>NIS</strong><br>
            {{$sis->nis}}<br>
            <strong>NISN</strong><br>
            {{$sis->nisn}}<br>
            <strong>Nama</strong><br>
            {{$sis->nama}}<br>
            <strong>Alamat</strong><br>
            {{$sis->alamat}}<br>
            <strong>Tempat Lahir</strong><br>
            {{$sis->tempat_lahir}}<br>
            <strong>Nama Ayah</strong><br>
            {{$sis->nama_ayah}}<br>
            <strong>Nama Ibu</strong><br>
            {{$sis->nama_ibu}}<br>
          </address>
        </div>
        <!-- /.col -->
      </div>
{{--     <a href={{ url("/profil/{$sis->id}/edit") }} class="btn btn-xs btn-primary">Edit Data</a> --}}
    @endforeach
  </div>
  <!-- /.box-body -->
</div>
@if (session('response'))
<div class="alert alert-success">{{session('response')}}</div>
@endif
@endsection
{{-- @section('content')
<div class="row">
<div class="col-md-6">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Biodata Siswa</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
   	@foreach ($siswa as $sis)
   <div class="row invoice-info">
   		{{-- expr --}}
        <!-- /.col -->
        {{-- <div class="col-sm-6 invoice-col">
          <address>
            <strong>NIS</strong><br>
            {{$sis->nis}}<br><br>
            <strong>NISN</strong><br>
            {{$sis->nisn}}<br><br>
            <strong>Nama</strong><br>
            {{$sis->nama}}<br><br>
            <strong>Alamat</strong><br>
            {{$sis->alamat}}<br><br>
            <strong>Tempat Lahir</strong><br>
            {{$sis->tempat_lahir}}<br><br>
            <strong>Nama Ayah</strong><br>
            {{$sis->nama_ayah}}<br><br>
            <strong>Nama Ibu</strong><br>
            {{$sis->nama_ibu}}<br>
          </address>
        </div>
        <!-- /.col -->
      </div>
   	@endforeach
  </div>
  <!-- /.box-body -->
</div>
</div>
</div>
@if (session('response'))
<div class="alert alert-success">{{session('response')}}</div>
@endif
@endsection --}} 