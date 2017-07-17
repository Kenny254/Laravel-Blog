<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('frontend/partials/welcome/_head')
    </head>
    <body>

        <div class="wrapper">
            <!-- Header -->
            @include('frontend/partials/welcome/_header')

            <!-- sliders area -->
            @include('frontend/partials/welcome/_sliders')

            <!-- service area -->
            @include('frontend/partials/welcome/_services')

            <!-- about area -->
            @include('frontend/partials/welcome/_about')

            <!-- features area -->
            @include('frontend/partials/welcome/_features')

            <!-- Counter area -->
            @include('frontend/partials/welcome/_counter')

            <!-- download Area -->
            @include('frontend/partials/welcome/_download')

            <!-- pricing area -->
            @include('frontend/partials/welcome/_pricing')

            <!-- newsletter area -->
            @include('frontend/partials/welcome/_newsletter')

            <!-- testimonials Area -->
            @include('frontend/partials/welcome/_testimonials')

            <!-- posts from the blog -->
            @include('frontend/partials/welcome/_from_the_blog')

            <!-- brand logo -->
            @include('frontend/partials/welcome/_brands')

            <!-- contact area -->
            @include('frontend/partials/welcome/_contact')

            <!-- footer area -->
            @include('frontend/partials/welcome/_footer')

            <!-- scroll to top -->
            <div id="toTop">
                <i class="fa fa-chevron-up"></i>
            </div>

        </div> <!-- .//End wrapper -->
        
        <!-- Scripts -->
		@include('frontend/partials/welcome/_scripts')
    </body>
</html>



