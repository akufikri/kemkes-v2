<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sinkarkes | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <x-dashboard.navbar />
        <x-dashboard.sidebar />
        <div class="content-wrapper">
            <section class="content-header">
                <h1>@yield('title_header')</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    @yield('breadcrumbs')
                </ol>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs"><b>Version</b> 2.4.18</div>
            <strong>Copyright &copy; 2025<a href="https://adminlte.io">Sinkarkes</a>.</strong> All rights reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ asset('template/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script>
    <script src="{{ asset('template/dist/js/demo.js') }}"></script>
    @stack('script')
</body>
</html>