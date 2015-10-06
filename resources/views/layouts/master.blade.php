<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>@yield('title') | M.O.T. Reminders</title>
        <meta name="description" content="">

        <link rel="apple-touch-icon" href="{{ asset('/assets/images/favicon_iphone.png') }}">
        <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">

        <link href="http://fonts.googleapis.com/css?family=Muli" rel="stylesheet" type="text/css">
        <link href="{{ asset('/bower_components/Slidebars/dist/slidebars.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('/style.css') }}">
        <!--[if lte IE 8]><link rel="stylesheet" href="../assets/styles/ie.css" /><![endif]-->
        <script src="{{ asset('/bower_components/modernizr/modernizr.js') }}"></script>
    </head>

    <body>

    @include('_nav')

    <div id="sb-site" class="site">

	@yield('content')

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"><\/script>')</script>

    <!-- build:js assets/scripts/plugins.js -->
    <script src="{{ asset('/bower_components/SimpleStateManager/dist/ssm.min.js') }}"></script>

    <script src="{{ asset('/bower_components/jquery-cycle2/build/jquery.cycle2.min.js') }}"></script>
    <script src="{{ asset('/bower_components/jquery-cycle2/build/plugin/jquery.cycle2.swipe.min.js') }}"></script>


    <script src="{{ asset('/bower_components/bootstrapValidator/dist/js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ asset('/bower_components/respond/dest/respond.min.js') }}"></script>
    <script src="{{ asset('/bower_components/Slidebars/dist/slidebars.min.js') }}"></script>
    <script src="{{ asset('/bower_components/flexnav/js/jquery.flexnav.js') }}"></script>
    <script src="{{ asset('/bower_components/ddsmoothmenu/ddsmoothmenu.js') }}"></script>
    <script src="{{ asset('/bower_components/matchHeight/jquery.matchHeight.js') }}"></script>
    <script src="{{ asset('/assets/scripts/cookies.min.js') }}"></script>
    <script src="{{ asset('/assets/scripts/stableford_calculator.js') }}"></script>
    <!-- endbuild -->

    <script src="{{ asset('/assets/scripts/plugins.js') }}"></script>
    <script src="{{ asset('/assets/scripts/main.js') }}"></script>

    <!--
    <script src="{{ asset('/assets/scripts/plugins.min.js') }}"></script>
    <script src="{{ asset('/assets/scripts/main.min.js') }}"></script>
    -->

    </body>
</html>