<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

<title>@yield('title')</title>


{{-- 
<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/frontend')}}/fonts/icomoon/style.css">

  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/magnific-popup.css">
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/animate.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  
  
  
  <link rel="stylesheet" href="{{asset('assets/frontend')}}/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/aos.css">

  <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/style.css"> --}}



  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
 

  <div class="wrapper">
@yield('auth')
    
 </div>
    <!-- ./wrapper -->
    
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('assets/admin')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/admin')}}/dist/js/adminlte.js"></script>
    
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('assets/admin')}}/dist/js/demo.js"></script>
    
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('assets/admin')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{asset('assets/admin')}}/plugins/chart.js/Chart.min.js"></script>
    
    <!-- PAGE SCRIPTS -->
    <script src="{{asset('assets/admin')}}/dist/js/pages/dashboard2.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
         $('.ckeditor').ckeditor();
      });
  </script>
    </body>
    </html>