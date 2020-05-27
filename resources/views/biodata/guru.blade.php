@extends('layouts.date')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Biodata Guru</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @foreach ($guru as $sis)
   <div class="row invoice-info">
      {{-- expr --}}
       
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <address>
            <strong>NIP</strong><br>
            {{$sis->nip}}<br>
            <strong>Nama</strong><br>
            {{$sis->nama}}<br>
            <strong>Tempat Lahir</strong><br>
            {{$sis->tempat_lahir}}<br>
            <strong>Status Pegawai</strong><br>
            {{$sis->status_pegawai}}<br>
            <strong>Pangkat</strong><br>
            {{$sis->pangkat}}<br>
            <strong>Golongan</strong><br>
            {{$sis->golongan}}<br>
            <strong>TMT</strong><br>
            {{$sis->tmt}}<br>
            <strong>Pendidikan Terakhir</strong><br>
            {{$sis->Pendidikan_terakhir}}<br>
            <strong>Jabatan</strong><br>
            {{$sis->jabatan}}<br>
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