@extends('layouts.datatable')

@section('content')
<div class="row">
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Petugas</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form" method="POST" action="{{ route('editpetugas', $petugas) }}">
                    {{ csrf_field() }}

            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$petugas->nama}}" required>
              </div>
               <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$petugas->alamat}}" required>
              </div>
               <div class="form-group">
                <label>Jenis kelamin</label>
                <input type="text" class="form-control" name="jkel" value="{{$petugas->jkel}}" required>
              </div>
               <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp" value="{{$petugas->telp}}" required>
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan_id" required>
                  @foreach ($jabatan as $roles)
                          @if ($roles->id == $petugas->jabatan_id)
                        <option value="{{$roles->id}}" selected>{{$roles->nama_jabatan}}</option>
                          @else
                        <option value="{{$roles->id}}">{{$roles->nama_jabatan}}</option>
                        @endif
                  @endforeach
                      </select>
               </div> 
               <div class="form-group">
                <label>Kantor</label>
                <select class="form-control" name="kantor" required>
                        <option value="{{$petugas->kantor}}">{{$petugas->kantor}}</option>
                  @foreach ($kantor as $roles)
                        <option value="{{$roles->nama_kantor}}">{{$roles->nama_kantor}}</option>
                  @endforeach
                      </select>
               </div>
            <!-- /.box-body -->

            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
        </div>
@endsection
