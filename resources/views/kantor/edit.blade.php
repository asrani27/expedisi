@extends('layouts.date')

@section('content')
<div class="row">
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Kantor</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('editkantor', $kantor) }}">
                    {{ csrf_field() }}
            <div class="box-body">
             
              <div class="form-group">
                  <label>Nama Kantor</label>
                  <input type="text" class="form-control" name="nama_kantor" value="{{$kantor->nama_kantor}}" required>
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
