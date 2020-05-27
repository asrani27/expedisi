@extends('layouts.datatable')

@section('content')
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Laba</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     
           <form method="POST" action="{{route('cetak9')}}">
                    {{ csrf_field() }}    
                    <div class="form-group">
                <label>Kantor Cabang</label>
                  <select class="form-control" name="asal_kc">
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
      @if (session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif
@endsection
