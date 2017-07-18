<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- CSS Files -->
    <link href="{{ asset('css/core/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Fonts and icons -->
    <link href="{{ asset('css/core/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/core/custom.css') }}" rel="stylesheet" />

    @stack('styles')


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body style="background-color: #F2F2F2">

    <!-- Default Navbar -->
    @include('frontend.partials._navbar')
    <!-- Header -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               @yield('content') 
            </div>
            <div class="col-md-4">
                @include('frontend.partials._sidebar')
            </div>  
        </div>

        <!-- footer -->
        @include('frontend.partials._footer')
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/core/smoothScroll.js') }}"></script>
    <script>
        $(document).ready(function() {
        jQuery.scrollSpeed(100, 800);
    });
    </script>
    <script>
        // Add slideDown animation to Bootstrap dropdown on hover.
        $('.navbar .dropdown').hover(function() {
          $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
        }, function() {
          $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp()
        });
    </script>
    
    @stack('scripts')
    
    
  </body>
</html>