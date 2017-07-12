<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Head elements -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Fonts and icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Theme Style -->
    <link href="{{ asset('AdminLTE/dist/css/AdminLTE.css') }}" rel="stylesheet" />
    <link href="{{ asset('AdminLTE/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
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
    <div class="wrapper">

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
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <!-- Fastclick -->
    <script src="{{ asset('AdminLTE/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/app.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
      $( document ).ready(function() {
          $.AdminLTE.dynamicMenu();
      });
    </script>
   
    @stack('scripts')
    
  </body>
</html>