<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dreamworks Integrated Systems</title>
  <!-- General CSS Files -->
  <!-- Styles -->
  <script src="https://code.highcharts.com/maps/highmaps.js"></script>
  <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/ng_vmap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">

  <!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
<link rel="stylesheet" href="{{ asset('assets/bundles/prism/prism.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/weather-icon/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/weather-icon/css/weather-icons-wind.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('website/vendor/font-awesome/css/all.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/stylesheet.css') }}"/>
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/favicon.ico') }}' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
  <style>
    #visitorMap {
    height: 500px;
    min-width: 310px;
    max-width: 800px;
    margin: 0 auto;
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}
  </style>
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('includes.nav')
        @include('includes.aside')
        @yield('content')
        @include('includes.footer') 
    </div>
  </div>

  <script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $( '#basic-usage' ).select2( {
     theme: "bootstrap-5",
  });
   </script>

<script>
  $( '#basic-product' ).select2( {
   theme: "bootstrap-5",
});
 </script>

<script>
  $( '.basic-detail' ).select2( {
   theme: "bootstrap-5",
});
 </script>
<script src="{{ asset('js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/ng_vmap.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/bundles/prism/prism.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/bundles/cleave-js/dist/cleave.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
  <script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets/js/page/index2.js') }}"></script>
  <script>
    $(document).ready(function(){
      var i=1;
      $("#add_row").click(function(){b=i-1;
          $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
          $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
          i++; 
      });
      $("#delete_row").click(function(){
        if(i>1){
      $("#addr"+(i-1)).html('');
      i--;
      }
    });
  });
  </script>
</body>
</html>
 
       
