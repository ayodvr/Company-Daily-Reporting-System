<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<title>:: Escort - Job Portal HTML Template ::</title>

<!-- Favicon Icon -->
<link rel="shortcut icon" href="{{ asset('assets/job_assets/img/favicon.png') }}" />

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/job_assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link href="{{ asset('assets/job_assets/plugins/bootstrap/css/bootsnav.css') }}" rel="stylesheet">
<link href="{{ asset('assets/job_assets/plugins/icons/css/icons.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/job_assets/plugins/bootstrap/css/bootstrap-wysihtml5.css') }}">
<link href="{{ asset('assets/job_assets/plugins/animate/animate.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/job_assets/plugins/nice-select/css/nice-select.css') }}">
<link href="{{ asset('assets/job_assets/plugins/date-dropper/datedropper.css') }}" rel="stylesheet">
<link href="{{ asset('assets/job_assets/plugins/aos-master/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/job_assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/job_assets/css/responsive.css') }}" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap" rel="stylesheet">
</head>
<body class="utf_skin_area">
<div class="page_preloader"></div>
<!-- ======================= Start Navigation ===================== -->
{{-- <nav class="navbar navbar-default navbar-mobile navbar-fixed light bootsnav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand" href="index-2.html"> <img src="assets/img/logo.png" class="logo logo-display" alt=""> <img src="assets/img/logo.png" class="logo logo-scrolled" alt=""> </a>
	</div>
    <div class="collapse navbar-collapse" id="navbar-menu">
      <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
        <li class="dropdown"> <a href="index-2.html">Home</a> </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employer</a>
          <ul class="dropdown-menu animated fadeOutUp">
            <li><a href="employer.html">Employer</a></li>
            <li><a href="employer-detail.html">Employer Detail</a></li>
            <li><a href="create-company.html">Create Company</a></li>
            <li><a href="manage-resume.html">Manage Resume</a></li>
            <li><a href="add-job.html">Add Job</a></li>
            <li><a href="resume-detail.html">Resume Detail</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Candidate</a>
          <ul class="dropdown-menu animated fadeOutUp">
            <li><a href="candidate.html">Candidate</a></li>
            <li><a href="browse-job.html">Browse Jobs</a></li>
            <li><a href="manage-job.html">Manage Jobs</a></li>
            <li><a href="browse-category.html">Browse Categories</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
          <ul class="dropdown-menu animated fadeOutUp">
            <li><a href="profile-settings.html">Profile Settings</a></li>
            <li><a href="job-detail.html">Job Detail</a></li>
            <li><a href="job-layout-one.html">Job Layout One</a></li>
            <li><a href="404.html">404</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="contact.html">Contact</a> </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="br-right"><a class="btn-signup red-btn" href="javascript:void(0)" data-toggle="modal" data-target="#signin"><i class="login-icon ti-user"></i>Login</a></li>
        <li class="sign-up"><a class="btn-signup red-btn" href="signup.html"><span class="ti-briefcase"></span>Register</a></li>
      </ul>
    </div>
  </div>
</nav> --}}
<!-- ======================= End Navigation ===================== -->
@yield('content')
@include('includes.job-footer')
<!-- Jquery js-->
<script src="{{ asset('assets/job_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/job_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/job_assets/plugins/bootstrap/js/bootsnav.js') }}"></script>
<script src="{{ asset('assets/job_assets/js/viewportchecker.js') }}"></script>
<script src="{{ asset('assets/job_assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/job_assets/plugins/bootstrap/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('assets/job_assets/plugins/bootstrap/js/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('assets/job_assets/plugins/aos-master/aos.js') }}"></script>
<script src="{{ asset('assets/job_assets/plugins/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/job_assets/js/custom.js') }}"></script>
<script>
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})
</script>
<script>
	$('#reservation-date').dateDropper();
</script>
<script>
	$(window).load(function() {
	  $(".page_preloader").fadeOut("slow");;
	});
	AOS.init();
</script>
</body>
</html>
