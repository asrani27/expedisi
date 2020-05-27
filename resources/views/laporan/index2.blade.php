@extends('layouts.datatable')

@section('content')
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Data Barang Sudah Sampai Di Kantor Cabang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     
           <form method="POST" action="{{route('cetak2')}}">
                    {{ csrf_field() }}

              <div class="form-group">
                <label>Asal KC</label>
                  <select class="form-control" name="tujuan_kc">
                    @foreach ($tujuan as $pel)
                    <option value="{{$pel->nama_kantor}}">{{$pel->nama_kantor}}</option>
                    @endforeach
                    </select>
                  </select>
              </div>
            <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View Barang Di Terima</h3>
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
              <th>Asal KC</th>
              <th>Tujuan KC</th>
              <th>Status</th>
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
                  <td>{{ $mp->asal_kc }}</td>
                  <td>{{ $mp->nama_kantor }}</td>
                  <td>{{ $mp->status }}</td>
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
