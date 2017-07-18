<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- CSS Files -->
  <link href="{{ asset('css/core/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- Fonts and icons -->
  <link href="{{ asset('css/core/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/core/ionicons.min.css') }}" rel="stylesheet">
  <!-- Theme Style -->
  <link href="{{ asset('css/dashboard/AdminLTE.css') }}" rel="stylesheet" />

  <!-- iCheck -->
  <link href="{{ asset('css/core/blue.css') }}" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">

    @yield('content')

    <!-- jQuery 3.2.1 -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('js/plugins/icheck.js') }}"></script>

    @stack('scripts')

</body>
</html>
