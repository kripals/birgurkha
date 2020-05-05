<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('website.name') }}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- END META -->

    <!-- BEGIN FAVICON -->
    <link rel="icon" type="image/png" href="{{ config('website.favicon') }}"/>
    <!-- END FAVICON -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialadmin.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/material-design-iconic-font.min.css') }}"/>
    <!-- END STYLESHEETS -->

    <!-- PAGE LEVEL STYLESHEETS -->
    @stack('styles')
    <!-- END PAGE LEVEL STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/libs/utils/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/utils/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">

@if (auth()->guest())
    @yield('guest')
@else
    @include('partials.header')
    <!-- BEGIN BASE-->
    <div id="base">
        <!-- BEGIN CONTENT-->
        <div id="content">
            @include('partials.errors')
            @yield('content')
        </div><!--end #content-->
        <!-- END CONTENT -->
        @include('partials.menubar')
    </div>
    <!-- END BASE -->
@endif

<!-- BEGIN JAVASCRIPT -->
<script src="{{ asset('js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('js/libs/autosize/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
<script src="{{ asset('js/core/source/App.js') }}"></script>
<script src="{{ asset('js/core/source/AppNavigation.js') }}"></script>
<script src="{{ asset('js/core/source/AppOffcanvas.js') }}"></script>
<script src="{{ asset('js/core/source/AppCard.js') }}"></script>
<script src="{{ asset('js/core/source/AppForm.js') }}"></script>
<script src="{{ asset('js/core/source/AppNavSearch.js') }}"></script>
<script src="{{ asset('js/core/source/AppVendor.js') }}"></script>
<script src="{{ asset('js/core/demo/Demo.js') }}"></script>
<!-- END JAVASCRIPT -->

<!-- START UTILITY SCRIPT -->
@include('partials.script')
<!-- END UTILITY SCRIPT -->

<!-- BEGIN PAGE LEVEL JAVASCRIPT -->
@stack('scripts')
<!-- END PAGE LEVEL JAVASCRIPT -->

</body>
</html>
