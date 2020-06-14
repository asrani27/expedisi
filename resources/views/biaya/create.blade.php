@extends('layouts.date')

@section('content')
<div class="row">
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Input Jenis Barang</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('savebiaya') }}">
                    {{ csrf_field() }}
            <div class="box-body">
             
              <div class="form-group">
                  <label>Dari</label>
                  <select name="dari" class="form-control">
                    @foreach ($kantor as $item)
                      <option value="{{$item->nama_kantor}}">{{$item->nama_kantor}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Ke</label>
                  <select name="ke" class="form-control">
                    @foreach ($kantor as $item)
                      <option value="{{$item->nama_kantor}}">{{$item->nama_kantor}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Biaya Kirim /KG</label>
                  <input type="text" class="form-control" name="biaya" placeholder="0" required>
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
