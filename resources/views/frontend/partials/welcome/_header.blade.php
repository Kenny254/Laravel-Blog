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
                                <li class="active"><a href="text-animator.html#home-area">HOME</a></li>
                                <li><a href="text-animator.html#about-area">About   </a></li>
                                <li><a href="text-animator.html#features-area">FEATURES</a></li>
                                <li><a href="text-animator.html#pricing-area">pricing </a></li>
                                <li><a href="text-animator.html#review-area">reviews</a></li>
                                <li><a href="text-animator.html#support-area">support</a></li>
                                <li><a href="{{ url('blog') }}">Blog </a></li>

                                @if(Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                <li><a href="{{ url('dashboard') }}">my dashboard </a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>