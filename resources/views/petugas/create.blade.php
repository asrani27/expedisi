@extends('layouts.datatable')

@section('content')
<div class="row">
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Petugas</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form" method="POST" action="{{ route('savepetugas') }}">
                    {{ csrf_field() }}

            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
               <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
               <div class="form-group">
                <label>Jenis kelamin</label>
                <input type="text" class="form-control" name="jkel" required>
              </div>
               <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp" required>
              </div>
              <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan_id" required>
                  @foreach ($jabatan as $roles)
                        <option value="{{$roles->id}}">{{$roles->nama_jabatan}}</option>
                  @endforeach
                      </select>
               </div>   
               <div class="form-group">
                <label>Kantor</label>
                <select class="form-control" name="kantor" required>
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
