<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/brand/favicon.ico')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <!-- TITLE -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/skin-modes.css')}}" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="{{ asset('plugins/sidemenu/closed-sidemenu.css')}}" rel="stylesheet">

    <!--C3 CHARTS CSS -->
    <link href="{{ asset('plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('css/icons.css')}}" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="{{ asset('plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('colors/color1.css')}}" />

    <!--SWEET ALERT CSS-->
    <link href="{{ asset('plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />

    <!-- SELECT2 CSS -->
    <link href="{{ asset('plugins/select2/select2.min.css')}}" rel="stylesheet" />

    <!-- MULTI SELECT CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/multipleselect/multiple-select.css')}}">

    @stack("styles")
</head>

<body class="app sidebar-mini">
    <div id="app" class="page">
        <div class="page-main">
            @include('layouts.admin.common.sidemenu')
            <div class="app-content">
                <div class="side-app">
                    @include("layouts.admin.common.header")

                    @include("layouts.includes.alert_message")

                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.admin.common.footer')
    </div>
</body>

</html>