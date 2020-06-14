@extends('layouts.datatable')

@section('content')

      @if (session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif

    <div class="row">
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
                    <input type="text" class="form-control" name="asal_kc" value="{{$data->asal_kc}}" readonly>
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
                <input type="text" class="form-control" name="asal_kc" value="{{$data->tujuan->first()->nama_kantor}}" readonly>
              </div>

              <div class="form-group">
                <label>Biaya Kirim Per KG</label>
              <input type="text" class="form-control" name="resi"  value="{{$biaya}}" readonly>
              </div>

              <div class="form-group">
                <label>No Resi</label>
                <input type="text" class="form-control" name="resi"  value="{{$data->resi }}" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                      <?php
                      $tgl =date('d/m/Y');
                      ?>
                <input type="text" class="form-control" name="tgl" value="{{$tgl}}" readonly>
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
                <input type="text" class="form-control" name="nama_pengirim"  value="{{ $data->nama_pengirim }}" readonly>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_pengirim" value="{{ $data->alamat_pengirim }}" readonly>
              </div>
              <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp_pengirim" value="{{ $data->telp_pengirim }}" readonly>
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
                <input type="text" class="form-control" name="nama_penerima" value="{{ $data->nama_penerima }}" readonly>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat_penerima" value="{{ $data->alamat_penerima }}" readonly>
              </div>
              <div class="form-group">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp_penerima" value="{{ $data->telp_penerima }}" readonly>
              </div>
            <div class="box-footer">
              <a href="/pengiriman/reset/{{$data->id}}" class="btn btn-danger">Reset</a>
            </div>
            </div>
        </div>
        <!-- /.box -->
        </div>
    </div>
    </form>

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
                  <input type="hidden" class="form-control" name="biaya"  value="{{$biaya}}" readonly>
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
    
        <div class="box-body">
            <form method="POST" action="{{ route('selesai') }}">
              {{ csrf_field() }}
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                            <th style="width: 10px">No</th>
                            <th>Type Barang</th>
                            <th>Berat</th>
                            <th>Jumlah/Unit</th>
                            <th>Harga/Kg</th>
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
                    <td>Rp. <?php echo Cart::subtotal(); ?></td>
                </tr>
            </tbody>
          </table>  
          <input type="hidden" class="form-control" name="resi"  value="{{$data->resi }}">
          <button type="submit" class="btn btn-success">Selesai</button>
            </form>
        </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
</div>
@endsection
