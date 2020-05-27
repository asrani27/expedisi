@extends('layouts.datatable')

@section('content')
<div class="box">
        <div class="box-header"><center>
          <h3  class="box-title">DAFTAR PENGIRIMAN BARANG</h3></center>
        </div>
</div>
<div class="box">
        <div class="box-header">
            <a href="{{ url('/pengiriman') }}" class="btn btn-xs btn-primary">Tambah Data</a>
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>No Resi</th>
              <th>Nama Pengirim</th>
              <th>Nama Penerima</th>
              <th>Tujuan KC</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($pengiriman as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->created_at }}</td>
                  <td>{{ $mp->resi }}</td>
                  <td>{{ $mp->nama_pengirim }}</td>
                  <td>{{ $mp->nama_penerima }}</td>
                  <td>{{ $mp->nama_kantor }}</td>
                  <td>{{ $mp->status }}</td>
                  <td>
                    <a href={{ url("pengiriman/{$mp->id}/detail") }}  class="btn btn-xs btn-success">Detail</a>
                    <a href={{ url("pengiriman/{$mp->id}/delete") }}  class="btn btn-xs btn-danger">Hapus</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>  
      
        </div>
        <!-- /.box-body -->
      </div>
      @if (session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif
      <!-- /.box -->
@endsection
