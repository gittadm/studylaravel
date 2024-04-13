<!DOCTYPE html>
<html class="loading" lang="ru" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="админ">
    <meta name="keywords" content="админ">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{--    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-gradient.css') }}">
    <!-- END: Page CSS-->

    <link rel="stylesheet" href="{{ asset('assets/vendors/js/ladda/ladda-themeless.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

@include('vuexy.layout.header')
@include('vuexy.layout.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@yield('content-title')</h2>
                        @yield('breadcrumbs')
                    </div>
                </div>
            </div>
            @yield('content-header-menu')
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('vuexy.layout.footer')

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/ladda/spin.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/ladda/ladda.jquery.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/js/core/app.js') }}"></script>
<script src="{{ asset('assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<!-- END: Theme JS-->

<script>
    {{--const _token = $('meta[name="csrf-token"]').attr('content');--}}
    {{--const _error = '{{ unknown_error() }}';--}}
    {{--$.ajaxSetup({headers: {'X-CSRF-TOKEN': _token}, type: 'POST', datatype: 'JSON',--}}
    {{--    error: function (e) {  }    });--}}


</script>

@yield('script')

</body>
</html>
