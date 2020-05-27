@extends('layouts.datatable')

@section('content')
<div class="box">
        <div class="box-header"><center>
          <h3  class="box-title">DATA MASTER JENIS BARANG</h3></center>
        </div>
</div>
<div class="box">
        <div class="box-header">
            <a href="{{ url('/barang/create') }}" class="btn btn-xs btn-primary">Tambah Data</a>
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Jenis Barang</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($bar as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->nama }}</td>
                  <td>
                    <a href={{ url("barang/{$mp->id}/edit") }}  class="btn btn-xs btn-primary">Edit</a>
                    <a href={{ url("barang/{$mp->id}/delete") }}  class="btn btn-xs btn-danger">Hapus</a>
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
