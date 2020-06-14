@extends('layouts.datatable')

@section('content')

      @if (session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif

    <div class="row">
      
    <form class="form" method="POST" action="{{ route('simpankirim') }}">
      {{ csrf_field() }}
  	 <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tujuan Pengiriman</h3>
          </div>
            <div class="box-body">

          @if (Auth::guest())
          @else
          @if (Auth::user()->hasRole('admin'))
                  <div class="form-group">
                    <label>Asal KC</label>
                      <select class="form-control" name="asal_kc">
                        @foreach ($semuatujuan as $pela)
                        <option value="{{$pela->nama_kantor}}"  @if(isset($asal_kc) && $asal_kc==$pela->nama_kantor) {{"selected"}}@endif >{{$pela->nama_kantor}}</option>
                        @endforeach
                        </select>
                      </select>
                  </div>
          @endif
          @if (Auth::user()->hasRole('kcbjm'))
                    <input type="hidden" class="form-control" name="asal_kc"  value="KC BANJARMASIN">
          @endif  
          @if (Auth::user()->hasRole('kcsby'))
                    <input type="hidden" class="form-control" name="asal_kc"  value="KC SURABAYA">
          @endif  
          @if (Auth::user()->hasRole('kcjkt'))
                    <input type="hidden" class="form-control" name="asal_kc"  value="KC JAKARTA">
          @endif
          @endif

              <div class="form-group">
                <label>Tujuan</label>
                  <select class="form-control" name="tujuan_id">
                    @foreach ($tujuan as $pel)
                    <option value="{{$pel->id}}">{{$pel->nama_kantor}}</option>
                    @endforeach
                    </select>
                  </select>
              </div>

              <div class="form-group">
                <label>No Resi</label>
                <input type="text" class="form-control" name="resi"  value="{{$no_random }}" required>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                      <?php
                      $tgl =date('d/m/Y');
                      ?>
                <input type="text" class="form-control" name="tgl" value="{{$tgl}}" required>
              </div>
            </div>
        </div>
      </div>  
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Pengirim</h3>
          </div>
            <div class="box-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_pengirim"  value="{{ old('nama_pengirim') }}" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_pengirim" value="{{ old('alamat_pengirim') }}" required>
              </div>
              <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp_pengirim" value="{{ old('telp_pengirim') }}" required>
              </div>
            </div>
        </div>
        <!-- /.box -->
        </div>

        <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Penerima</h3>
          </div>
            <div class="box-body">
               <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_penerima" value="{{ old('nama_penerima') }}" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_penerima" value="{{ old('alamat_penerima') }}" required>
              </div>
              <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp_penerima" value="{{ old('telp_penerima') }}" required>
              </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
        <!-- /.box -->
        </div>
    </div>
    </form>
</div>
@endsection
