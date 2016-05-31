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
  <base href="{{ url('') }}">
  @yield('css')
</head>
<body class="layout-page">
@yield('content')
<!-- Vendor -->
<script type="text/javascript" src="{{ asset('assets/js/backend-vendor.js') }}"></script>
<!-- Custom Theme Scripts -->
<script type="text/javascript" src="{{ asset('assets/js/backend-app.js') }}"></script>
@yield('js')
</body>
</html>
