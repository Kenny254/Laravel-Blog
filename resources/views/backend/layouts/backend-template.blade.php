<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Head elements -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- CSS Files -->
    <link href="{{ asset('css/core/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Fonts and icons -->
    <link href="{{ asset('css/core/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core/ionicons.min.css') }}" rel="stylesheet">
    <!-- Theme Style -->
    <link href="{{ asset('css/dashboard/AdminLTE.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard/_all-skins.min.css') }}" rel="stylesheet" />
    @stack('styles')


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
  
  <body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper" id="app">

      <!-- Navbar -->
      @include('backend.partials._navbar')
      <!-- Sidebar -->
      @include('backend.partials._sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         @yield('content-header')

        <!-- Main content -->
        <section class="content">
         
          
              @include('backend.partials._messages')
          

          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- Main footer -->
      @include('backend.partials._footer')
      <!-- Control sidebar -->
      @include('backend.partials._control-sidebar')

    </div> <!-- /.wrapper -->
    
    <!-- App JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap Show Password-->
    <script src="{{ asset('js/plugins/bootstrap-show-password.js') }}"></script>
    <!-- Fastclick -->
    <script src="{{ asset('js/plugins/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/dashboard/adminLTE.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('js/plugins/jquery.slimscroll.min.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('js/core/custom.js') }}"></script>
    <script>
      $( document ).ready(function() {
          $.AdminLTE.dynamicMenu();
      });
    </script>
   
    @stack('scripts')
    
  </body>
</html>