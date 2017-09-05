<div id="home-area" class="main-slider-area bg-oapcity-40 bg-img-1">
    <div class="container">
        <div class="row">
            <div class="home-sliders clearfix mid-mrg">
                <div class="col-md-7 col-sm-8">
                    <div class="top-text pt-120">
                        <div class="slider-text">
                            <h2 class="cd-headline clip"> 
                                <span class="cd-words-wrapper">
                                    <b class="is-visible"> Easy Integration <i class="fa fa-thumbs-up" style="color: white;"></i></b>
                                    <b>Elegant UI <i class="fa fa-laptop" style="color: white;"></i></b>
                                    <b>Best Support <i class="fa fa-phone-square" style="color: white;"></i></b>
                                </span>
                            </h2>
                            <p>The best blogging application in the market, with maximum support and powerful features that are gonna make blogging a breeze!!</p>
                            @if(Auth::guest())
                                <div class="button-set">
                                    <a class="button" href="{{ url('/login') }}">
                                        LOGIN
                                    </a>
                                    <a class="button active" href="{{ url('/register') }}">
                                        REGISTER
                                    </a>
                                </div>
                            @else
                                <div class="button-set">
                                    <a href="{{ route('posts.create') }}" class="button">New Post</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
                    <div class="slider-imgj">
                        <img src="{{ asset('images/man.png') }}" alt="" style="height: 435px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>