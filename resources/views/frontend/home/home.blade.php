<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Metas Page details-->
<title>SHINEE - School of Hospitality and Integrated Education</title>
<meta name="description" content="UX designer and web developer">
<meta name="author" content="">
<!-- Mobile Specific Metas-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="{{ asset('public/assets/frontend') }}/logo/blc.png" type="image/x-icon">
<!--main style-->
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/assets/frontend') }}/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/assets/frontend') }}/css/main.css">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/assets/frontend') }}/css/skins/default.css" data-name="skins">

<link href="{{asset('public/assets/frontend')}}/css/toastr.css" rel="stylesheet"/>

<!--google font style-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!--font-family: 'Metrophobic', sans-serif;-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
<!--font-family: 'Open Sans', sans-serif; -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,500,300italic,300,100,500italic' rel='stylesheet' type='text/css'>
<!--font-family: 'Roboto', sans-serif; -->

<!-- font icon css style-->
<link rel="stylesheet" href="{{ asset('public/assets/frontend') }}/css/font-awesome.min.css">
</head>
<body onLoad="load()" onUnload="GUnload()">

<!--wrapper start-->
<div class="wrapper" id="wrapper"> 
  <!-- Preloader -->
  <div id="preloader">
    <div id="status"></div>
  </div>
  <!--Header start -->
  <header>
    @include('frontend.home.partials.nav')

    @include('frontend.home.partials.banner')
    
    @include('frontend.home.partials.signup')
    
  </header>
  <!--Header end --> 
  @include('frontend.home.partials.courses')
  <!--fun facts start -->
  @include('frontend.home.partials.faculties')
  <!--Bottom Four Column start-->
  @include('frontend.layouts.partials.footer')
  <!--/Bottom Four Column end --> 
  <!--Footer start-->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="pull-left">
          <p>&copy; 2023  SHINEE. All Rights Reserved.</p>
        </div>
        <div class="pull-right"><a class="gototop smooth" href="#wrapper">Go To Top<i class="fa fa-chevron-up"></i></a></div>
      </div>
    </div>
  </footer>
  <!--Footer end --> 
</div>
<!--wrapper end--> 

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

<!--modernizr js--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/modernizr.custom.26633.js"></script> 
<!--jquary min js--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery-1.11.2.min.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/bootstrap.min.js"></script> 

<!--for placeholder jquery--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.placeholder.js"></script> 

<!--for header jquery--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/stickUp.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script> 
<script type="text/javascript">
"use strict";
//<![CDATA[
	$('.header_v1 #banner').superslides({
	  animation: 'fade',
	  play: 5000
	});
//]]>
</script> 

<!--for portfolio jquery--> 
<script src="js/jquery.isotope.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" property="stylesheet" id="theme" href="{{ asset('public/assets/frontend') }}/css/jquery-ui-1.8.16.custom.css">
<link type="text/css" rel="stylesheet" property="stylesheet" href="{{ asset('public/assets/frontend') }}/css/lightbox.min.css">
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.ui.widget.min.js"></script> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.ui.rlightbox.js"></script> 

<!--for video lightbox -->
<link rel="stylesheet" property="stylesheet" href="{{ asset('public/assets/frontend') }}/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="{{ asset('public/assets/frontend') }}/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!--contact form js--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.contact.js"></script> 
<!--Newsletter js--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.subscribe.js"></script> 
<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxSPW5CJgpdgO_s4yyMovOaVh_KvvhSfpvagV18eOyDWu7VytS6Bi1CWxw" type="text/javascript"></script> 
<script type="text/javascript">
	"use strict";
    //<![CDATA[
    var map;

    function load() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(-37.817682, 144.957595), 13);
        document.getElementById("map").checked = true;
        toggleZoom(false);
      }
    }

    function toggleZoom(isChecked) {
      if (isChecked) {
        map.enableScrollWheelZoom();
      } else {
        map.disableScrollWheelZoom();
      }
    }

    //]]>
</script> 

<!--about jquery--> 
<script src="{{ asset('public/assets/frontend') }}/js/jquery.classyloader.min.js"></script> 
<script defer src="{{ asset('public/assets/frontend') }}/js/jquery.flexslider.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/jquery.easing.js"></script> 
<script src="{{ asset('public/assets/frontend') }}/js/jquery.mousewheel.js"></script> 
<script defer src="{{ asset('public/assets/frontend') }}/js/slideroption.js"></script> 

<!--Home Testimonial --> 
<script>


</script> 

<!--for coundown jquary--> 
<script type="text/javascript" src="{{ asset('public/assets/frontend') }}/js/jquery.countTo.js"></script> 
<script type="text/javascript">
jQuery(function($) {
$(document).ready( function() {
  //enabling stickUp on the '.navbar-wrapper' class
	$('.navbar-wrapper').stickUp({
		parts: {
		  0: 'banner',
		  1: 'courses',
		  2: 'faculties',
		  3: 'contact',
		  @if(auth()->check())
		  4: 'logout',
		  @else
		  4: 'login'
		  @endif
		},
		itemClass: 'menuItem',
		itemHover: 'active',
		topMargin: 'auto'
		});
	
		// run rlightbox
		$( ".lb" ).rlightbox();
		$( ".lb_title-overwritten" ).rlightbox({overwriteTitle: true});
		
		$('.flexslider').flexslider({
			animation: "fade",
			animationLoop: true,
			slideshow: true,
			pauseOnAction: false,
			slideshowSpeed: 7000,
			controlNav: true,
			start: function(slider){
			$('body').removeClass('loading');
			}
		});		
	
	var activeImage;

	var getmaxHeight = 0;
	$(".testimonialText li").each(function(index, element) {
        if($(this).height()>getmaxHeight){
			getmaxHeight = $(this).height();
			$(".footerTopContent").height(getmaxHeight);
			}
    });
	
    $(".testimonialText li").fadeTo("fast",0);
	$(".testimonialText li:first").fadeTo("fast",1);
	$(".imageSlide .imageBox").removeClass("activeImage");
	$(".imageSlide .imageBox:first").addClass("activeImage");
	$(".imageSlide .imageBox").mouseenter(function(){
		if(!$(this).hasClass("activeImage")){
			var gi = $(this).index();
			//console.log(gi);
			$(".imageSlide .imageBox").removeClass("activeImage");
			$(this).addClass("activeImage");
			$(".testimonialText li").fadeTo("fast",0);
			$(".testimonialText li:eq("+gi+")").fadeTo("fast",1);
			}
	})
		
	// Video lightbox
	$("a[data-rel^='prettyPhoto']").prettyPhoto();	
	
	// for client work jquary
	var windowBottom = $(window).height()+0;
	var index=0;
	$(document).scroll(function(){
		divposition = parseInt($('.factabout').offset().top),10;
		divsrollpos = parseInt($(window).scrollTop()),10;
		ctop = parseInt(divposition-divsrollpos),10;
		if(ctop<Math.round(windowBottom/2)){
			if(index==0){	
				
				$('.timer').each(count);
				
			}
			index++;
		}
	});



function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
}
	
	
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