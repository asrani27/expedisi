 
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('LTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
    {{-- Menampilkan Nama User       --}}
      @if (Auth::guest())
      @else
      @if (Auth::user()->hasRole('admin'))
      {{ Auth::user()->name }}
      @endif
      @if (Auth::user()->hasRole('kcbjm'))
      {{ Auth::user()->name }}
      @endif  
      @if (Auth::user()->hasRole('kcsby'))
      {{ Auth::user()->name }}
      @endif  
      @if (Auth::user()->hasRole('kcjkt'))
      {{ Auth::user()->name }}
      @endif
      @endif
    
    </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
    {{--   <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      @if (Auth::guest())
      @else
      @if (Auth::user()->hasRole('admin'))
      {{--  Jika Yang Login Adalah Admin --}}
      <li>
        <a href="{{ url('/home') }}">
          <i class="fa fa-home"></i> <span>Home Admin</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/user') }}"><i class="fa fa-circle-o"></i>User</a></li>
            <li><a href="{{ url('/barang') }}"><i class="fa fa-circle-o"></i>Jenis Barang</a></li>
            <li><a href="{{ url('/jabatan') }}"><i class="fa fa-circle-o"></i>Jabatan</a></li>
            <li><a href="{{ url('/petugas') }}"><i class="fa fa-circle-o"></i>Petugas</a></li>
            <li><a href="{{ url('/kantor') }}"><i class="fa fa-circle-o"></i>Kantor Cabang</a></li>
          </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/pengiriman') }}"><i class="fa fa-circle-o"></i>Pengiriman</a></li>
            <li><a href="{{ url('/pengiriman/daftar') }}"><i class="fa fa-circle-o"></i>Daftar Pengiriman</a></li>
            <li><a href="{{ url('/penerimaan') }}"><i class="fa fa-circle-o"></i>Penerimaan Kiriman</a></li>
            <li><a href="{{ url('/pengambilan') }}"><i class="fa fa-circle-o"></i>Pengambilan Oleh Customer</a></li>
          </ul>
      </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/laporan1') }}"><i class="fa fa-circle-o"></i>Lap. Pengiriman</a></li>
                <li><a href="{{ url('/laporan2') }}"><i class="fa fa-circle-o"></i>Lap. Diterima</a></li>
                <li><a href="{{ url('/laporan3') }}"><i class="fa fa-circle-o"></i>Lap. Pengambilan</a></li>
                <li><a href="{{ url('/laporan4') }}"><i class="fa fa-circle-o"></i>Lap. Pengirim</a></li>
                <li><a href="{{ url('/laporan5') }}"><i class="fa fa-circle-o"></i>Lap. Penerima</a></li>
                <li><a href="{{ url('/laporan6') }}"><i class="fa fa-circle-o"></i>Lap. Petugas</a></li>
                <li><a href="{{ url('/laporan7') }}"><i class="fa fa-circle-o"></i>Lap. Pendapatan</a></li>
                <li><a href="{{ url('/laporan8') }}"><i class="fa fa-circle-o"></i>Cetak Invoice</a></li>
                <li><a href="{{ url('/laporan9') }}"><i class="fa fa-circle-o"></i>Lap. Laba</a></li>
              </ul>
          </li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-unlock-alt"></i> <span>Log Out</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      @endif

      @if (Auth::user()->hasRole('kcbjm'))
      {{--  Jika Yang Login Adalah siswa --}}
      <li>
        <a href="{{ url('/home') }}">
          <i class="fa fa-home"></i> <span>Home KC BJM</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/pengiriman') }}"><i class="fa fa-circle-o"></i>Pengiriman</a></li>
            <li><a href="{{ url('/pengiriman/daftar') }}"><i class="fa fa-circle-o"></i>Daftar Pengiriman</a></li>
            <li><a href="{{ url('/penerimaan') }}"><i class="fa fa-circle-o"></i>Penerimaan Kiriman</a></li>
            <li><a href="{{ url('/pengambilan') }}"><i class="fa fa-circle-o"></i>Pengambilan Oleh Customer</a></li>
          </ul>
      </li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-unlock-alt"></i> <span>Log Out</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      @endif
      @if (Auth::user()->hasRole('kcsby'))
      {{--  Jika Yang Login Adalah guru --}}
      <li>
        <a href="{{ url('/home') }}">
          <i class="fa fa-home"></i> <span>Home KC SBY</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/pengiriman') }}"><i class="fa fa-circle-o"></i>Pengiriman</a></li>
            <li><a href="{{ url('/pengiriman/daftar') }}"><i class="fa fa-circle-o"></i>Daftar Pengiriman</a></li>
            <li><a href="{{ url('/penerimaan') }}"><i class="fa fa-circle-o"></i>Penerimaan Kiriman</a></li>
            <li><a href="{{ url('/pengambilan') }}"><i class="fa fa-circle-o"></i>Pengambilan Oleh Customer</a></li>
          </ul>
      </li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-unlock-alt"></i> <span>Log Out</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      @endif
      @if (Auth::user()->hasRole('kcjkt'))
      {{--  Jika Yang Login Adalah pegawai --}}
      <li>
        <a href="{{ url('/home') }}">
          <i class="fa fa-home"></i> <span>Home KC JKT</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/pengiriman') }}"><i class="fa fa-circle-o"></i>Pengiriman</a></li>
            <li><a href="{{ url('/pengiriman/daftar') }}"><i class="fa fa-circle-o"></i>Daftar Pengiriman</a></li>
            <li><a href="{{ url('/penerimaan') }}"><i class="fa fa-circle-o"></i>Penerimaan Kiriman</a></li>
            <li><a href="{{ url('/pengambilan') }}"><i class="fa fa-circle-o"></i>Pengambilan Oleh Customer</a></li>
          </ul>
      </li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-unlock-alt"></i> <span>Log Out</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      @endif
      
      @endif
      </ul>

    </section>
  </aside>