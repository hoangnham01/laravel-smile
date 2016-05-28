<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ isset($title) ? $title : '' }}</title>
  <link rel="icon" type="image/png" href="{{ config('theme.setting.favicon') }}" />
  <link href="{{ asset('assets/css/backend-vendor.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/backend-theme.css') }}" rel="stylesheet">
  @yield('css')
</head>
<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      @include('backend.partial.sidebar-menu')
    </div>
    <!-- top navigation -->
    @include('backend.partial.navigation')
    <!-- /top navigation -->
    <!-- page content -->
    <div class="right_col" role="main">
      @yield('content')
    </div>
    <!-- /page content -->
    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>
<!-- Vendor -->
<script src="{{ asset('assets/js/backend-vendor.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/js/backend-theme.js') }}"></script>
@yield('js')
</body>
</html>