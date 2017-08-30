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
                    <a href="{{ url('/') }}" id="logo" style="font-size: 21px; font-weight: bold;" class="text-info">{{ config('app.name') }}</a>
                  </div>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                          <li><a href="{{ url('/') }}" class="{{ Request::is('/' ? "active" : "") }}">Home</a></li>
                          <li><a href="{{ route('blog.index') }}" class="">Blog</a></li>
                          <li><a href="#categories">Categories</a></li>

                          @if(Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                          @else
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative; padding-left: 35px;">
                              <img src="/images/avatars/{{ Auth::user()->avatar }}" style="width: 30px; height: 30px; border-radius: 50%; position: absolute; top: -10px; left: 0;">
                              {{ Auth::user()->name }}
                              <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" style="margin-top: 10px;">
                                <li><a href="{{ url('dashboard') }}">My Dashboard</a></li>
                                <li><a href="{{ route('posts.create') }}">New Post</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout 
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                              </ul>
                            </li>
                          @endif
                      </ul>
                  </div><!-- /.navbar-collapse -->
                </div>
             </div>
           </nav>
         </div>
     </div>
   </div>
 </header>