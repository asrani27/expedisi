@extends('layouts.datatable')

@section('content')
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Data Tarif Pengiriman</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     
           <form method="POST" action="{{route('cetak7')}}">
                    {{ csrf_field() }}    
                    <div class="form-group">
                <label>Kantor Cabang</label>
                  <select class="form-control" name="asal_kc">
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
          <h3 class="box-title">View Tarif</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>No Resi</th>
              <th>Jumlah Tarif</th>
              <th >Asal KC</th>
              <th >Tujuan KC</th>
            </tr>
            </thead>

            <tbody>
                
                @php $no = 1; @endphp
                @foreach($pengiriman as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->created_at }}</td>
                  <td>{{ $mp->resi }}</td>
                  <td>{{ format_uang($mp->total) }}</td>
                  <td>{{ $mp->asal_kc }}</td>
                  <td>{{ $mp->nama_kantor }}</td>
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
