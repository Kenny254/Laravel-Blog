 <header>
   <div id="trueheader">
     <div class="wrapper">
         <div class="menu-main">
           <nav class="navbar navbar-default navbar-fixed-top">
             <div class="container">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                  </button>
                  <div class="logo">
                    <a href="" id="logo" style="font-size: 21px; font-weight: bold;" class="text-info">{{ config('app.name') }}</a>
                  </div>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                          <li><a href="{{ url('/') }}" class="{{ Request::is('/' ? "active" : "") }}">Home</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="#"><i class="fa fa-television"></i> Lifestyle</a></li>
                              <li><a href="#"><i class="fa fa-female"></i> Fashion</a></li>
                              <li><a href="#"><i class="fa fa-tree"></i> Nature</a></li>
                              <li><a href="#"><i class="fa fa-cutlery"></i> &nbsp;Food</a></li>
                              <li><a href="#"><i class="fa fa-male"></i> &nbsp;&nbsp;Political</a></li>
                              <li><a href="#"><i class="fa fa-bar-chart"></i> Economics</a></li>
                              <li><a href="#"><i class="fa fa-laptop"></i> Technology</a></li>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ url('dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                              <li><a href="#"><i class="fa fa-user"></i> &nbsp;Profile</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                          </li>

                          
                      </ul>
                  </div><!-- /.navbar-collapse -->
                </div>
             </div>
           </nav>
         </div>
     </div>
   </div>
 </header>