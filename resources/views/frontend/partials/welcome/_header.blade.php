<header class="header-area">
                <!-- Menu Area
    ============================================ -->
    <div id="main-menu" class="sticker">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="logo float-left navbar-header">
                        <a class="navbar-brand" href=""><i class="fa fa-desktop fa-2x" style="color: white;"></i></a>
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-2">
                            <i class="fa fa-bars menu-open"></i>
                            <i class="fa fa-times menu-close"></i>
                        </button>
                    </div>
                    <div class="main-menu float-right collapse navbar-collapse" id="main-menu-2">
                        <nav>
                            <ul class="menu one-page">
                                <li class="active push-it"><a href="text-animator.html#home-area" class="fancy">Home</a></li>
                                <li class="push-it"><a href="text-animator.html#about-area" class="fancy">About</a></li>
                                <li class="push-it"><a href="text-animator.html#features-area" class="fancy">Features</a></li>
                                <li class="push-it"><a href="text-animator.html#pricing-area" class="fancy">Pricing</a></li>
                                <li class="push-it"><a href="text-animator.html#review-area" class="fancy">Reviews</a></li>
                                <li class="push-it"><a href="text-animator.html#support-area" class="fancy">Support</a></li>
                                <li class="push-it"><a href="{{ url('blog') }}" class="fancy">Blog </a></li>

                                @if(Auth::guest())
                                    <li class="push-it"><a href="{{ route('login') }}" class="fancy">Login</a></li>
                                    <li class="push-it"><a href="{{ route('register') }}" class="fancy">Register</a></li>
                                @else
                                    <li class="dropdown push-it">
                                        <a href="#" class="dropdown-toggle fancy" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('/dashboard') }}">My Dashboard</a>
                                            </li>
                                            
                                            <li>
                                                <a href="{{ url('/profile') }}">My Profile</a>
                                            </li>
                                            
                                            <li>
                                                <a href="{{ url('/blog') }}">Blog</a>
                                            </li>
                                            
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
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>