@php

use App\Models\Users;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

$user = Auth::user();


@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIPTAS</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/prism/prism.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3 mt-1">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
               
          
            <p class="mt-4"><span class="text-white" id="hari"></span>, 
                <span class="text-white" id="tanggal"></span>&nbsp;
                <span class="text-white" id="bulan"></span>&nbsp;
                <span class="text-white" id="tahun"></span>, 
                <span class="text-white" id="waktu"></span>
            </p>
      
               
         
        </form>
        
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{AUTH::user()->name}}&nbsp;</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
                @if ($user->role == 1)
                <div class="dropdown-title">Admin</div>
                @elseif($user->role == 2)
                <div class="dropdown-title">Users</div>    
                @endif
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" href="" data-toggle="modal" data-target="#default">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            
              
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand mt-4">
            <a href=""><h4>SIPTAS</h4></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><small>SIPTAS</small></a>
          </div>
          <ul class="sidebar-menu">
          @if ($user->role == 1)
          <li class="menu-header">Dashboard</li>
          <li class="{{ request()->is('dashboard-admin*') ? 'active' : '' }}"><a class="nav-link" href="{{url('/dashboard-admin')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

          <li class="menu-header">Main</li>
          <li class="{{ request()->is('stok-material*') ? 'active' : '' }} {{ request()->is('detail-stok-material*') ? 'active' : '' }}">
            <a class="nav-link " href="{{url('/stok-material')}}"><i class="fas fa-medal"></i> <span>Stok Aksesoris</span></a>
          </li>
          <li class="{{ request()->is('stok-bahan*') ? 'active' : '' }} {{ request()->is('detail-stok-bahan*') ? 'active' : '' }}">
            <a class="nav-link " href="{{url('/stok-bahan')}}"><i class="fas fa-tshirt"></i> <span>Stok Bahan</span></a>
          </li>

          <li class="{{ request()->is('stok-tas*') ? 'active' : '' }} {{ request()->is('detail-stok-tas*') ? 'active' : '' }}">
            <a class="nav-link " href="{{url('/stok-tas')}}"><i class="fas fa-briefcase"></i> <span>Stok Tas</span></a>
          </li>
          <li class="menu-header">Other</li>

          <li class="{{ request()->is('laporan*') ? 'active' : '' }} {{ request()->is('detail-laporan*') ? 'active' : '' }}">
            <a class="nav-link " href="{{url('/laporan')}}"><i class="fas fa-file"></i> <span>Laporan</span></a>
          </li>

          @elseif($user->role == 2)
          <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('dashboard-users*') ? 'active' : '' }}"><a class="nav-link" href="{{url('/dashboard-users')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Main</li>
            <li class="{{ request()->is('data-stok-material*') ? 'active' : '' }} {{ request()->is('detail-data-stok-material*') ? 'active' : '' }}">
              <a class="nav-link " href="{{url('/data-stok-material')}}"><i class="fas fa-medal"></i> <span>Stok Aksesoris</span></a>
            </li>
            <li class="{{ request()->is('data-stok-bahan*') ? 'active' : '' }} {{ request()->is('detail-data-stok-bahan*') ? 'active' : '' }}">
              <a class="nav-link " href="{{url('/data-stok-bahan')}}"><i class="fas fa-tshirt"></i> <span>Stok Bahan</span></a>
            </li>
  
            <li class="{{ request()->is('data-stok-tas*') ? 'active' : '' }} {{ request()->is('detail-data-stok-tas*') ? 'active' : '' }}">
              <a class="nav-link " href="{{url('/data-stok-tas')}}"><i class="fas fa-briefcase"></i> <span>Stok Tas</span></a>
            </li>
         
          @endif
            <br>
            

          </ul>
          <div class="sidebar-brand mt-4">
            <center>
              <button type="button" class="btn btn-outline-danger w-75" data-toggle="modal" data-target="#default">
                  <i class="fas fa-door-open"></i>&nbsp; Logout
              </button>
          </center>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <center>
              <button type="button" class="btn btn-outline-danger w-75" data-toggle="modal" data-target="#default">
                  <i class="fas fa-door-open"></i>
              </button>
          </center>
          </div>
          
                 </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <script>document.write(new Date().getFullYear())</script> <div class="bullet"></div> Design By <strong>Ikhsan</strong> 
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <form  action="{{ route('logout') }}" method="POST">
    @csrf
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Logout</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    Apakah anda yakin ingin keluar dari website <b>SIPTAS</b>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tidak</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Ya</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

  <!-- General JS Scripts -->
  <script type="text/javascript">
    function updateClock() {
        const now = new Date();
        
        document.getElementById('hari').textContent = now.toLocaleDateString(undefined, { weekday: 'long' });
        document.getElementById('tanggal').textContent = now.getDate();
        document.getElementById('bulan').textContent = now.toLocaleDateString(undefined, { month: 'long' });
        document.getElementById('tahun').textContent = now.getFullYear();
        document.getElementById('waktu').textContent = now.toLocaleTimeString();
    }

    // Update waktu setiap detik
    setInterval(updateClock, 1000);

    // Memastikan tampilan awal sudah terisi
    updateClock();
</script>

  <script src="{{asset('modules/jquery.min.js')}}"></script>
  <script src="{{asset('modules/popper.js')}}"></script>
  <script src="{{asset('modules/tooltip.js')}}"></script>
  <script src="{{asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('modules/moment.min.js')}}"></script>
  <script src="{{asset('js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('modules/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('modules/chart.min.js')}}"></script>
  <script src="{{asset('modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
  <script src="{{asset('modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('modules/prism/prism.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/index.js')}}"></script>
  <script src="{{asset('js/page/modules-datatables.js')}}"></script>
  <script src="{{asset('js/page/bootstrap-modal.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>