@extends('layouts.date')

@section('content')
<div class="row">
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Input Jabatan</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('savejab') }}">
                    {{ csrf_field() }}
            <div class="box-body">
             
              <div class="form-group">
                  <label>Nama Jabatan</label>
                  <input type="text" class="form-control" name="nama" placeholder="" required>
              </div>
             
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
        </div>
      </div>
@endsection
