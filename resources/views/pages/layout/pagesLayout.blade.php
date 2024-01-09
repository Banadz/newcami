<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="getServices" content="{{ route('allService') }}">
        <meta name="getDivisions" content="{{ route('allDivision') }}">
        <meta name="getAgents" content="{{ route('allAgent') }}">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        @yield('secialCss')
        <link rel="stylesheet" href="modules/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="modules/summernote/dist/summernote-bs4.css">
        <link rel="stylesheet" href="modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="modules/mohithg-switchery/dist/switchery.min.css">


        <link rel="stylesheet" href="modules/owl.carousel/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="modules/owl.carousel/dist/assets/owl.theme.default.css">

        <link rel="stylesheet" href="modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            {{-- HEADER --}}
            @include('pages.partition.header')
            <div class="page-wrap">
                {{-- SIDEBAR --}}
                @include('pages.partition.sidebar')
                <div class="main-content">
                    <div class="container-fluid">
                        @yield('entete')


                        @yield('content')

                        @yield('updateModal')
                    </div>
                </div>
                {{-- FOOTER --}}
                @include('pages.partition.footer')
            </div>
        </div>




        {{-- TOOLS SEACH --}}
        @include('pages.partition.tools')


        {{-- IMPORT --}}
        {{-- @include('pages.partition.config') --}}

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        {{-- <script src="modules/select2/dist/js/select2.js"></script> --}}
        <script src="js/forms.js"></script>

        <script src="dist/js/theme.min.js"></script>

        {{-- MY JS --}}

        {{-- <script src="modules/.personnel/Register.js"></script> --}}
        {{-- <script src="modules/.personnel/articleOperation.js"></script> --}}

        @yield('specialScript')
    </body>
</html>
