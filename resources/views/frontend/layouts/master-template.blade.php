<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Head elements -->
    @include('frontend.partials._head')
  </head>
  
  <body>

    <!-- Default Navbar -->
    @include('frontend.partials._navbar')

    <!--  Main Content -->
      <div class="container">
        <!-- All messages in the session -->
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
              @include('frontend.partials._messages')
          </div>
        </div>
        <!-- Main content in each page -->
        @yield('content') 
      </div>      
    

    <!-- Javascript files -->
    @include('frontend.partials._scripts')
    
  </body>
</html>