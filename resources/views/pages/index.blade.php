<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI - Home</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="modules/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="modules/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="modules/c3/c3.min.css">
        <link rel="stylesheet" href="modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="modules/owl.carousel/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="modules/owl.carousel/dist/assets/owl.theme.default.css">
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
                <style>
                    .homeAlone{
                        background-image: url('images/Finance/comptabilité.jpg');
                        background-size: cover;
                        background-size: contain;
                        background-position: center;
                        background-repeat: no-repeat;
                    }

                </style>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="{{ route('demande') }}">
                                    <div class="widget">
                                        <div class="widget-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="state">
                                                    <h6>Nouveaux</h6>
                                                    <h2>{{ $dashboard['NEW'] }}</h2>
                                                </div>
                                                <div class="icon">
                                                    <i class="ik ik ik-alert-circle"></i>
                                                </div>
                                            </div>
                                            <small class="text-small mt-10 d-block">Demande(s) en attente</small>
                                        </div>
                                        <div class="progress progress-sm">
                                            @if ($dashboard['ALL'] == 0)
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $dashboard['NEW'] }}" 
                                                aria-valuemin="0" aria-valuemax="100" 
                                                style="width: 0%;"></div>
                                            @else
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $dashboard['NEW'] }}" 
                                                aria-valuemin="0" aria-valuemax="{{ $dashboard['ALL'] }}" 
                                                style="width: {{ ($dashboard['NEW'] / $dashboard['ALL']) * 100}}%;"></div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="{{ route('livringDemande') }}">
                                    <div class="widget">
                                        <div class="widget-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="state">
                                                    <h6>Livraison</h6>
                                                    <h2>{{ $dashboard['LIVRING'] }}</h2>
                                                </div>
                                                <div class="icon">
                                                    <i class="ik ik-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <small class="text-small mt-10 d-block">En cours de livraison</small>
                                        </div>
                                        <div class="progress progress-sm">
                                            @if ($dashboard['ALL'] == 0)
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $dashboard['LIVRING'] }}" 
                                                aria-valuemin="0" aria-valuemax="100" 
                                                style="width: 0%;"></div>
                                            @else
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $dashboard['LIVRING'] }}" 
                                                aria-valuemin="0" aria-valuemax="{{ $dashboard['ALL'] }}" 
                                                style="width: {{ ($dashboard['LIVRING'] / $dashboard['ALL']) * 100}}%;"></div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="{{ route('LivredDemande') }}">
                                    <div class="widget">
                                        <div class="widget-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="state">
                                                    <h6>Reçu</h6>
                                                    <h2>{{ $dashboard['LIVRED'] }}</h2>
                                                </div>
                                                <div class="icon">
                                                    <i class="ik ik-check-circle"></i>
                                                </div>
                                            </div>
                                            <small class="text-small mt-10 d-block">Total de(s) demande(s) déjà livré(s)</small>
                                        </div>
                                        <div class="progress progress-sm">
                                            @if ($dashboard['ALL'] == 0)
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $dashboard['LIVRED'] }}" 
                                                aria-valuemin="0" aria-valuemax="100" 
                                                style="width: 0%;"></div>
                                            @else
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $dashboard['LIVRED'] }}" 
                                                aria-valuemin="0" aria-valuemax="{{ $dashboard['ALL'] }}" 
                                                style="width: {{ ($dashboard['LIVRED'] / $dashboard['ALL']) * 100}}%;"></div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="{{ route('deniedDemande') }}">
                                    <div class="widget">
                                        <div class="widget-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="state">
                                                    <h6>Refusé</h6>
                                                    <h2>{{ $dashboard['DENIED'] }}</h2>
                                                </div>
                                                <div class="icon">
                                                    <i class="ik ik-x-circle"></i>
                                                </div>
                                            </div>
                                            <small class="text-small mt-10 d-block">Nombre de(s) demande(s) réfusé(s)</small>
                                        </div>
                                        <div class="progress progress-sm">
                                            @if ($dashboard['ALL'] == 0)
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $dashboard['DENIED'] }}" 
                                                aria-valuemin="0" aria-valuemax="100" 
                                                style="width: 0%;"></div>
                                            @else
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $dashboard['DENIED'] }}" 
                                                aria-valuemin="0" aria-valuemax="{{ $dashboard['ALL'] }}" 
                                                style="width: {{ ($dashboard['DENIED'] / $dashboard['ALL']) * 100}}%;"></div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="min-height: 422px;">
                                    <div class="card-header"><h3>Donut chart</h3></div>
                                    <div class="card-body">
                                        <div id="c3-donut-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- FOOTER --}}
                @include('pages.partition.footer')
            </div>
        </div>




        {{-- TOOLS SEACH --}}
        @include('pages.partition.tools')

        {{-- IMPORT --}}
        @include('pages.partition.config')

        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="modules/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="modules/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="modules/moment/moment.js"></script>
        <script src="modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="modules/d3/dist/d3.min.js"></script>
        <script src="modules/c3/c3.min.js"></script>
        <script src="js/tables.js"></script>

        <script src="js/widgets.js"></script>
        <script src="js/charts.js"></script>

    </body>
</html>
