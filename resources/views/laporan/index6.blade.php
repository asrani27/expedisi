@extends('layouts.datatable')

@section('content')
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Data Petugas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     
           <form method="POST" action="{{route('cetak6')}}">
                    {{ csrf_field() }}   
                    <div class="form-group">
                <label>Kantor Cabang</label>
                  <select class="form-control" name="kantor">
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
          <h3 class="box-title">View Data Petugas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jabatan</th>
              <th>Telp</th>
              <th>Kantor</th>
            </tr>
            </thead>

            <tbody>
               @php $no = 1; @endphp
                @foreach($lap6 as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->nama }}</td>
                  <td>{{ $mp->alamat }}</td>
                  <td>{{ $mp->nama_jabatan }}</td>
                  <td>{{ $mp->telp }}</td>
                  <td>{{ $mp->kantor }}</td>
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
