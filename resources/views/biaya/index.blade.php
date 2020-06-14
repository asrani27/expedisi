@extends('layouts.datatable')

@section('content')
<div class="box">
        <div class="box-header"><center>
          <h3  class="box-title">DATA MASTER BIAYA PENGIRIMAN</h3></center>
        </div>
</div>
<div class="box">
        <div class="box-header">
            <a href="{{ url('/biaya/create') }}" class="btn btn-xs btn-primary">Tambah Data</a>
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Dari</th>
              <th>Ke</th>
              <th>Harga/KG</th>
              <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($data as $b)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $b->dari }}</td>
                  <td>{{ $b->ke }}</td>
                  <td>{{ $b->biaya }}</td>
                  <td>
                    <a href={{ url("biaya/{$b->id}/edit") }}  class="btn btn-xs btn-primary">Edit</a>
                    <a href={{ url("biaya/{$b->id}/delete") }}  class="btn btn-xs btn-danger">Hapus</a>
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
