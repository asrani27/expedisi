@extends('layouts.datatable')

@section('content')
<div class="box">
        <div class="box-header"><center>
          <h3  class="box-title">DATA MASTER KANTOR CABANG</h3></center>
        </div>
</div>
<div class="box">
        <div class="box-header">
            <a href="{{ url('/kantor/create') }}" class="btn btn-xs btn-primary">Tambah Data</a>
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama KC</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($kantor as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->nama_kantor }}</td>
                  <td>
                    <a href={{ url("kantor/{$mp->id}/edit") }}  class="btn btn-xs btn-primary">Edit</a>
                    <a href={{ url("kantor/{$mp->id}/delete") }}  class="btn btn-xs btn-danger">Hapus</a>
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
