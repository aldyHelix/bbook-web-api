<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - B-BOOK APPS</title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <meta name="application-name" content="B-BOOK APPS"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/icons/mstile-144x144.png') }}" />

    <!--<link media="all" type="text/css" rel="stylesheet" href="{{ asset(('assets/css/vendor.css')) }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset(('assets/css/app.css')) }}"> -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/vendors/css/vendors.min.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/vendors/css/pickers/pickadate/pickadate.css')) }}">
    @yield('styles')
    <!-- BEGIN VUEXY CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/bootstrap.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/bootstrap-extended.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/colors.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/components.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(('assets/css/gijgo.min.css')) }}">

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset(('app-assets/css/core/menu/menu-types/vertical-menu.css')) }}">
    <!-- BEGIN Custom CSS-->


    <!--
    @hook('app:styles') -->
</head>

@guest
<body>
<div class="app-content content" style="margin-left: 0;">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@else
<!-- <body class="horizontal-layout horizontal-menu navbar-floating" data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar"> -->
<body class="vertical-layout vertical-menu-modern 2-columns navbar-sticky menu-collapsed footer-light" data-menu="vertical-menu-modern" data-col="2-columns" data-open="hover" data-layout="semi-dark">


    @include('partials.navbar')

    <div class="app-content content">
    <div class="content-wrapper">

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@yield('page-heading')</h2>

                    </div>
                </div>
            </div>
        </div>
            @yield('content')
    </div>
</div>
@endguest

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019
            <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span>
            <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset(('app-assets/vendors/js/vendors.min.js')) }}"></script>
    <script src="{{ asset(('app-assets/vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(('app-assets/vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(('app-assets/vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(('app-assets/vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset(('app-assets/js/core/app-menu.js')) }}"></script>
    <script src="{{ asset(('app-assets/js/core/app.js')) }}"></script>
    <script src="{{ asset(('app-assets/js/scripts/components.js')) }}"></script>
    <script src="{{ asset(('assets/js/gijgo.min.js')) }}"></script>
    <!-- END: Theme JS-->
    <script type="text/javascript">
      $('.ymd-picker').pickadate({
          format: 'yyyy-mm-dd',
            selectMonths: true,
            selectYears: 60,
            max: true
      });
      $('.time-picker').each(function() {
        $(this).timepicker({
            uiLibrary: 'bootstrap4',
             icons: {
                 rightIcon: '<i class="fa fa-clock-o"></i>'
             }
          });
      })
    </script>

    {{-- <script src="{{ asset(('assets/js/vendor.js')) }}"></script> --}}
    <script src="{{ asset('assets/js/as/app.js') }}"></script>
    @yield('scripts')
    @yield('scripts2')
</body>
</html>
