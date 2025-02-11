<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    @livewireStyles

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/summernote/summernote-bs4.min.css') }}">

{{--    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])--}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('asset/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo"
             height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('main') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

        </ul>
        <div class="dropdown ml-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" type="submit">{{ __('Log Out') }}</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if (session()->has('message'))
            <div class="alert alert-success position-absolute top-0 end-0 mt-3 me-3 p-2 rounded shadow"
                 style="width: 300px; z-index: 1050;">
                <span>{{ session('message') }}</span>
            </div>
        @endif
        @yield('content')
        {{--        {{ $slot  }}--}}

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        {{--        <a class="d-flex justify-content-center nav-link" href="#">yyyyyy</a>--}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@livewireScripts
<!-- jQuery -->
<script src="{{ asset('asset/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('asset/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>--}}

<!-- ChartJS -->
{{--<script src="{{ asset('asset/adminlte/plugins/chart.js/Chart.min.js') }}"></script>--}}
<!-- Summernote -->
<script src="{{ asset('asset/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('asset/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/adminlte/dist/js/adminlte.js') }}"></script>
</body>
</html>


