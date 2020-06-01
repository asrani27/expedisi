@extends('layouts.datatable')

@section('content')

      @if (session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif
      <!-- /.box -->
 

  <div class="row">
  	  <div class="col-md-4">
        <!-- general form elements -->
                <form method="POST" action="{{ route('tambahbarang') }}">
                    {{ csrf_field() }}
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Barang</h3>
          </div>
            <div class="box-body">
              <div class="form-group">
                    <label>Barang</label>
                    <select class="form-control" name="barang_id">
                      @foreach ($barang as $bar)
                      <option value="{{$bar->id}}">{{$bar->nama}}</option>
                      @endforeach
                      </select>
              </div>
              <div class="form-group">
                <label>Berat /Kg</label>
                <input type="text" class="form-control" name="berat" required>
              </div>
              <div class="form-group">
                <label>Jml Unit</label>
                <input type="text" class="form-control" name="unit" value="1" required>
              </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
      </form>
        <!-- /.box -->
   </div>
<div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Barang yang Di Kirim</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->

                <form class="form" method="POST" action="{{ route('simpankirim') }}">
                    {{ csrf_field() }}
             <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                            <th style="width: 10px">No</th>
                            <th>Type Barang</th>
                            <th>Berat</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th style="width: 40px">Aksi</th>
                </tr>
            </thead>

            <tbody> 
              @php $no = 1; @endphp
              
                        <?php foreach(Cart::content() as $row) :?>
                <tr>
                  <td>{{ $no++ }}</td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->qty / $row->options->unit; ?> Kg</td>
                  <td><?php echo $row->options->unit; ?></td>
                  <td>Rp. <?php echo $row->price; ?></td>
                  <td>Rp. <?php echo $row->subtotal; ?></td>
                  <td>
                    <a href={{ url("pengiriman/remove/{$row->rowId}/{$row->id}") }} class="btn btn-xs btn-danger">X</a>
                  </td>
                </tr>
              <?php endforeach;?>
               <tr>
                    <td colspan="4">&nbsp;</td>
                    <td>Total</td>
                    <td>Rp. <?php echo Cart::total(); ?></td>
                </tr>
            </tbody>
          </table>  
            <!-- /.box-body -->

        </div>
        </div>
        <!-- /.box -->
        </div>
       </div>

        <!-- /.box -->


    <div class="row">
<form class="form" method="POST" action="{{ route('simpankirim') }}">
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
                    <option value="{{$pela->nama_kantor}}">{{$pela->nama_kantor}}</option>
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
        <!-- general form elements -->
                    {{ csrf_field() }}
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
              <button type="submit" class="btn btn-primary">Selesai</button>
            </div>
            </div>
        </div>
        <!-- /.box -->
        </div>
    </div>
    </form>
</div>
<
@endsection
