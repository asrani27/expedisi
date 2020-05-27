@extends('layouts.datatable')

@section('content')
<div class="row">
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data User</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form" method="POST" action="{{ route('edituser',$user) }}">
                    {{ csrf_field() }}

            <div class="box-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="{{$user->username}}" required>
              </div>
               <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" >
                *Bila tidak di ubah, kosongkan saja
              </div>
               <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
              </div>
              <div class="form-group">
                <label>Role Level</label>
                <select class="form-control" name="role_id" required>
                  @foreach ($role as $roles)
                        <option value="{{$roles->id}}">{{$roles->display_name}}</option>
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
