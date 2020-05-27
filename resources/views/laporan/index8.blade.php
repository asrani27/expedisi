@extends('layouts.datatable')

@section('content')
      {{-- <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Data Pengiriman</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     
           <form method="POST" action="{{route('cetak1')}}">
                    {{ csrf_field() }}
            </form>
        </div>
        <!-- /.box-body -->
      </div> --}}
      <!-- /.box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View Invoice</h3>
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
                @foreach($lap8 as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->created_at }}</td>
                  <td>{{ $mp->resi }}</td>
                  <td>{{ $mp->nama_pengirim }}</td>
                  <td>{{ $mp->nama_penerima }}</td>
                  <td>{{ $mp->nama_kantor }}</td>
                  <td>{{ $mp->status }}</td> <td>
                    <a href={{ url("laporan8/{$mp->id}/cetak") }}  class="btn btn-xs btn-success">Cetak</a>
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
@endsection
