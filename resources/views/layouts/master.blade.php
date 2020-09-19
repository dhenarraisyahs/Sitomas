<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/croppie.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        </div>
      </div>
    </form>
    <div class="ribbon-wrapper ribbon-lg">
  <div class="ribbon bg-success text-lg">
    revisi 4
  </div>
  </div>

    <!-- Right navbar links -->
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="sitomas.dev" class="brand-link">
      <h3>SiToMas  <i class="fab fa-acquisitions-incorporated"></i></h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>Request Emas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pricesemas.index')}}" class="nav-link">
              <i class="nav-icon fas fa-braille"></i>
              <p>Setting Harga Emas</p>
            </a>
          </li>
          <li class="nav-header">Penjualan & Pembelian</li>
          <li class="nav-item">
            <a href="{{route('transaksi.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>Penjualan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('report_trx')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
          <li class="nav-header">Data Utama Perhiasan</li>
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>Perhiasan Jadi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('mahkota.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Mahkota</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('cabinet.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Cabinet</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-header">Master Data</li>
          <li class="nav-item">
            <a href="{{route('customer.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>Customer</p>
            </a>
            <li class="nav-item">
            <a href="{{route('balance.index')}}" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>Balance</p>
            </a>
          <li class="nav-header">Laporan</li>
          <a href="{{route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-toilet-paper"></i>
              <p>Barang Laku</p>
            </a>
          <li class="nav-header">Pengaturan</li>
          <a href="{{route('pengaturan.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Toko</p>
            </a>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('breadcrumb')
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.2
    </div>
    <strong>Copyright &copy; 16.N1.0007 <a>Chris</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>

<script src="{{asset('js/croppie.min.js')}}"></script>

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}

<script>
  function convertToRupiah(angka)
    {
	    var rupiah = '';		
	    var angkarev = angka.toString().split('').reverse().join('');
	    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	    return 'Rp'+rupiah.split('',rupiah.length-1).reverse().join('');
    }   

    function convertToAngka(rupiah)
    {
        // console.log('hai',rupiah);
	    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    }
</script>
{{-- <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="modalMdTitle"></h4>
          </div>
          <div class="modal-body">
              <div class="modalError"></div>
              <div id="modalMdContent"></div>
          </div>
      </div>
  </div>
</div> --}}

@yield('script')
@stack('script')
</body>
</html>
