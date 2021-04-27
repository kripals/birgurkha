<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE LEVEL STYLESHEETS -->
        @stack('styles')
    <!-- END PAGE LEVEL STYLESHEETS -->

    <!-- Document Title
    ============================================= -->
    <title>@yield('title') - {{ config('website.name') }}</title>
</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    @include('frontend.partials.header')
    <!-- #header end -->

    @include('partials.errors')

    @yield('content')

    <!-- Footer
    ============================================= -->
    @include('frontend.partials.footer')
    <!-- #footer end -->
</div><!-- #wrapper end -->
    
<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts -->
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/plugins.min.js') }}"></script>

<!-- Footer Scripts -->
<script src="{{ asset('frontend/js/functions.js') }}"></script>

<!-- BEGIN PAGE LEVEL JAVASCRIPT -->
    @stack('scripts')
<!-- END PAGE LEVEL JAVASCRIPT -->

</body>

</html>