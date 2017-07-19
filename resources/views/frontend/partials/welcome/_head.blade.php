<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name') }} - Welcome Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="{{ asset('css/core/bootstrap.min.css') }}">
		<!-- font-awesome CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/core/font-awesome.min.css') }}">
		<!-- et-line-fonts CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/et-line-fonts.css') }}">
		<!-- ionicons CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/core/ionicons.min.css') }}">
		<!-- magnific-popup CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/magnific-popup.css') }}">
        <!-- animate-headline css
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/animate-headline.css') }}">
        <!-- venobox CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/venobox.css') }}">
		<!-- slick CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/slick.css') }}">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front/owl.transitions.css') }}">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/animate.css') }}">
		<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/normalize.css') }}">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/main.css') }}">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/style.css') }}">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('css/front/responsive.css') }}">

        <style>
					.dropdown-menu>li>a {
					    color: #FFF;
					    text-decoration: none;
					    padding-top: 5px;
					}
					.dropdown-menu>li>a:hover {
					   background: transparent;
					}
					.dropdown ul.dropdown-menu {
					    border-radius:1px;
					    box-shadow:none;
					    margin-top:20px;
					    background: #4A90E2;
					}
					.dropdown ul.dropdown-menu:before {
					    content: "";
					    border-bottom: 10px solid #4A90E2;
					    border-right: 10px solid transparent;
					    border-left: 10px solid transparent;
					    position: absolute;
					    top: -10px;
					    right: 16px;
					    z-index: 10;
					}
					.dropdown ul.dropdown-menu:after {
					    content: "";
					    border-bottom: 12px solid transparent;
					    border-right: 12px solid transparent;
					    border-left: 12px solid transparent;
					    position: absolute;
					    top: -12px;
					    right: 14px;
					    z-index: 9;
					}
        </style>
        
		<!-- modernizr JS
		============================================ -->		
        <script src="{{ asset('js/front/vendor/modernizr-2.8.3.min.js') }}"></script>