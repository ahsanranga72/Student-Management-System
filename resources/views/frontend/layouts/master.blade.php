<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SHINEE - School of Hospitality and Integrated Education</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{ asset('public/assets/frontend') }}/logo/blc.png"
        type="image/x-icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" type="text/css" media="screen"
        href="{{ asset('public/assets/frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/js/inner-js/css/settings.css" />
    <link rel="stylesheet" type="text/css" media="screen"
        href="{{ asset('public/assets/frontend') }}/css/main.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/frontend') }}/css/inner-style.css" media="screen">
    <link rel="stylesheet" type="text/css" media="screen"
        href="{{ asset('public/assets/frontend') }}/css/skins/default.css" data-name="skins">

    <link href="{{ asset('public/assets/frontend') }}/css/toastr.css" rel="stylesheet" />
    <!--google font style-->
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <!--font-family: 'Great Vibes', cursive; -->
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700'
        rel='stylesheet' type='text/css'>
    <!--font-family: 'Open Sans', sans-serif; -->
    <!-- font icon css style-->
    <link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/font-awesome.min.css">
    @stack('css')
    <style>
        @media screen and (max-width: 810px){
            .logo{
                margin-top: -18px;
            }
        }
        @media screen and (min-width: 811px){
            .logo{
                margin-top: 0;
            }
        }
    </style>
</head>

<body class="inner-page">
    <!--wrapper start-->
    <div class="wrapper" id="wrapper">
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"></div>
        </div>
        <!--Start Header-->
        <header>
            <!--menu start-->
            <div class="menu">
                <div class="navbar-wrapper">
                    <div class="container">
                        <div class="navwrapper">
                            <div class="navbar navbar-inverse navbar-static-top">
                                <div class="container">
                                    <!--Logo -->
                                    <div class="logo">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('public/assets/frontend') }}/logo/blc.png"
                                                alt="logo" style="width: 80px;">
                                        </a>
                                    </div>
                                    <!--Logo -->
                                    <nav class="navArea">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                data-target=".navbar-collapse"> <span class="icon-bar"></span> <span
                                                    class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                        </div>
                                        <div class="navbar-collapse collapse">
                                            <ul class="nav navbar-nav" id="navigation">
                                                <li class="menuItem" id="home"><a
                                                        href="{{ route('home') }}">Home</a></li>
                                                <li class="menuItem"><a
                                                        href="{{ route('home') }}">courses</a></li>
                                                <li class="menuItem"><a
                                                        href="{{ route('home') }}">faculties</a></li>
                                                <li class="menuItem"><a
                                                        href="{{ route('frontend.about-us') }}">About us</a></li>
                                                <li><a
                                                        href="{{ route('login') }}">Login</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div>
            <!--menu end-->
        </header>
        <!--End Header-->

        @yield('content')
        
        <!--Bottom Four Column start-->
        @include('frontend.layouts.partials.footer')
        <!--/Bottom Four Column end -->
        <!--Footer start-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="pull-left">
                        <p>&copy; 2023 SHINEE. All Rights Reserved.</p>
                    </div>
                    <div class="pull-right"><a class="gototop smooth" href="#wrapper">Go To Top<i
                                class="fa fa-chevron-up"></i></a></div>
                </div>
            </div>
        </footer>
        <!--Footer end -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 40vh;">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <h4>Please login to continue.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" style="background: #8b3232; border-bottom: 3px solid #621616;">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
            </div>
        </div>
    </div>
<!--jquary min js--> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/bootstrap.min.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/jquery.easing.1.3.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/retina-1.1.0.min.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/inner-js/js/jquery.theme.revolution.min.js"></script> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.jcarousel.js"></script> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/swipe.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/main.js"></script> 
<!--for portfolio jquery--> 
<script src="{{ asset('public/assets/frontend') }}/js/jquery.isotope.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" id="theme" href="{{ asset('public/assets/frontend') }}/css/jquery-ui-1.8.16.custom.css">
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/lightbox.min.css">
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.ui.widget.min.js"></script> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.ui.rlightbox.js"></script> 
<script type="text/javascript">
	jQuery(function($) {
	 "use strict";					
		$(document).ready( function() {
		// run rlightbox
		$( ".lb" ).rlightbox();
		$( ".lb_title-overwritten" ).rlightbox({overwriteTitle: true});
		});
	
	});
</script> 

<!--for theme custom jquery--> 
<script src="{{ asset('public/assets/frontend') }}/js/custom.js"></script>
<script src="{{asset('public/assets/frontend')}}/js/toastr.js"></script>
<script>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}');
    @endforeach
  @endif

  @if(session()->has('success'))
    toastr.success('{{ session('success') }}');
  @endif
</script>
</body>
</html>