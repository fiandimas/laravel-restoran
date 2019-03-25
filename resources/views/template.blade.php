<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Restoran fiandimas &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
              <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('img/avatar/default.png') }}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, {{ Session::get('name') }}</div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="/">Stisla</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="/">St</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dasbor</li>
              <li class="{{ isset($adashboard) ? $adashboard : '' }}">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> <span>Dasbor</span></a>
              </li>
              @if(Session::get('id_level') == 1)
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ isset($alevel) ? $alevel : '' }}"><a class="nav-link" href="{{ url('/level') }}">Level</a></li>
                  <li class="{{ isset($amenu) ? $amenu : '' }}"><a class="nav-link" href="{{ url('/masakan') }}">Masakan</a></li>
                  <li class="{{ isset($auser) ? $auser : '' }}"><a class="nav-link" href="{{ url('/pengguna') }}">Pengguna</a></li>
                </ul>
              </li>
              @endif
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cart-plus"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ isset($atransaction) ? $atransaction : '' }}"><a class="nav-link" href="{{ url('/transaksi') }}">Transaksi</a></li>
                </ul>
              </li>
              @if(Session::get('id_level') == 1)
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-print"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ isset($areport) ? $areport : '' }}"><a class="nav-link" href="{{ url('/laporan') }}">Laporan PDF</a></li>
                </ul>
              </li>
              @endif
            </ul>
          </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>{{ $capt }}</h1>
            </div>
            @yield('dashboard')
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-wrap">
                    @yield('content')
                  </div>
                </div>
              </div>
            </div>
            @yield('transaction')
          </section>
        </div>
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
          </div>
        </footer>
      </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/swal.js') }}"></script>
    <script>
      // Set ajax headers
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
    </script>
    <script>const url = "{{ url('') }}";</script>
    @isset($js)
      <script src="{{ asset($js) }}"></script>
    @endisset
    @isset($cart)
      <script src="{{ asset($cart) }}"></script>
    @endisset
  </body>
</html>