<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mophy.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jun 2022 00:11:10 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard" />
	<meta name="author" content="DexignZone" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="MOPHY : Payment Admin Dashboard  Bootstrap 5 Template" />
	<meta property="og:title" content="MOPHY : Payment Admin Dashboard  Bootstrap 5 Template" />
	<meta property="og:description" content="MOPHY : Payment Admin Dashboard  Bootstrap 5 Template" />
	<meta property="og:image" content="social-image.png"/>
	<meta name="format-detection" content="telephone=no">
    <title>MOPHY - Payment Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('retail/images/favicon.png') }}">
    <link href="{{ asset('retail/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('retail/vendor/chartist/css/chartist.min.css') }}">
	<!-- Vectormap -->
    <link href="{{ asset('retail/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('retail/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('retail/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('retail/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		@include('includes.portal.nav')

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        @include('includes.portal.chatbox')

        <!--**********************************
            Chat box End
        ***********************************-->
         
        <!--**********************************
            Header start
        ***********************************-->
        @include('includes.portal.header')

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('includes.portal.aside')

        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->

        @include('includes.portal.footer')

        <!--**********************************
            Footer end
        ***********************************-->

    </div>

    <!-- Required vendors -->
    <script src="{{ asset('retail/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('retail/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('retail/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('retail/js/custom.min.js') }}"></script>
	<script src="{{ asset('retail/js/deznav-init.js') }}"></script>
	<script src="{{ asset('retail/vendor/owl-carousel/owl.carousel.js') }}"></script>		
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('retail/vendor/peity/jquery.peity.min.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('retail/vendor/apexchart/apexchart.js') }}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('retail/js/dashboard/dashboard-1.js') }}"></script>
	

	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				center:true,
				dots: false,
				navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
				responsive:{
					0:{
						items:2
					},
					400:{
						items:3
					},	
					700:{
						items:5
					},	
					991:{
						items:6
					},			
					
					1200:{
						items:4
					},
					1600:{
						items:5
					}
				}
			})	
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>

<!-- Mirrored from mophy.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jun 2022 00:11:51 GMT -->
</html>