@extends('layouts.datatable')

@section('content')

      @if (session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif
      <!-- /.box -->
 

  <div class="row">
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Pengiriman</h3>
          </div>
            <div class="box-body">
              <div class="form-group">
                  <table  class="table table-bordered">
                <tr>
                  <td>No Resi</td><td>{{$p->resi}}</td>
                </tr>
                <tr>
                  <td>Asal</td><td>{{$p->asal_kc}}</td>
                </tr>
                <tr>
                  <td>Tujuan</td><td>{{$p->tujuan->first()->nama_kantor}}</td>
                </tr>
                <tr>
                  <td>Tanggal Kirim</td><td>{{$p->created_at}}</td>
                </tr>
                <tr>
                  <td>Total Biaya</td><td>{{$p->total}}</td>
                </tr>
               
                </table>
              </div>
            </div>
        </div>
      </div>
        <!-- 
  	  <div class="col-md-4">
        <!-- general form elements -->
    <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Pengirim</h3>
          </div>
            <div class="box-body">
              <div class="form-group">
                <table  class="table table-bordered">
                
                <tr>
                  <td>Nama Pengirim</td><td>{{$p->nama_pengirim}}</td>
                </tr>
                <tr>
                  <td>Alamat Pengirim</td><td>{{$p->alamat_pengirim}}</td>
                </tr>
                <tr>
                  <td>Telp Pengirim</td><td>{{$p->telp_pengirim}}</td>
                </tr>
                </table>
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
                <table  class="table table-bordered">
                <tr>
                  <td>Nama Penerima</td><td>{{$p->nama_penerima}}</td>
                </tr>
                <tr>
                  <td>Alamat Penerima</td><td>{{$p->alamat_penerima}}</td>
                </tr>
                <tr>
                  <td>Telp Penerima</td><td>{{$p->telp_penerima}}</td>
                </tr>
               
                </table>
              </div>
            </div>
        </div>
        <!-- /.box -->
   </div>
</div>

        <!-- /.box -->


    <div class="row">
  	 <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Barang Yang Di Kirim</h3>
          </div>
            <div class="box-body">
             
       <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Jenis Barang</th>
              <th>Jumlah/Unit</th>
            </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($dp as $mp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mp->jenis_barang }}</td>
                  <td>{{ $mp->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>  
            </div>
        </div>
      </div>  

</div>
@endsection
