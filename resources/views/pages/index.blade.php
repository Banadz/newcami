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

                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Nouveaux</h6>
                                                <h2>50</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-thumbs-up"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Demande(s) en attente</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Réfusé</h6>
                                                <h2>6</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-award"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Nombre de demande réfusé</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Validé</h6>
                                                <h2>30</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-message-square"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total de demande acordé</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Livaraison</h6>
                                                <h2>4</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">En cours de livraison</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width: 4%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Reçu</h6>
                                                <h2>10</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-calendar"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total de demande déjà livré</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                    </div>
                                </div>
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
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h4 class="card-title">Weather Report</h4>
                                            <select class="form-control w-25 ml-auto">
                                                <option selected="">Today</option>
                                                <option value="1">Weekly</option>
                                            </select>
                                        </div>
                                        <div class="d-flex align-items-center flex-row mt-30">
                                            <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span>23<sup>°</sup></span></div>
                                            <div class="p-2">
                                            <h3 class="mb-0">Saturday</h3><small>Banglore, India</small></div>
                                        </div>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>Wind</td>
                                                    <td class="font-medium">ESE 17 mph</td>
                                                </tr>
                                                <tr>
                                                    <td>Humidity</td>
                                                    <td class="font-medium">83%</td>
                                                </tr>
                                                <tr>
                                                    <td>Pressure</td>
                                                    <td class="font-medium">28.56 in</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <ul class="list-unstyled row text-center city-weather-days mb-0 mt-20">
                                            <li class="col"><i class="wi wi-day-sunny mr-5"></i><span>09:30</span><h3>20<sup>°</sup></h3></li>
                                            <li class="col"><i class="wi wi-day-cloudy mr-5"></i><span>11:30</span><h3>22<sup>°</sup></h3></li>
                                            <li class="col"><i class="wi wi-day-hail mr-5"></i><span>13:30</span><h3>25<sup>°</sup></h3></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="min-height: 422px;">
                                    <div class="card-header">
                                        <h3>Timeline</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                                <li><i class="ik ik-x close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body timeline">
                                        <div class="header bg-theme" style="background-image: url('images/placeholder/placeimg_400_200_nature.jpg')">
                                            <div class="color-overlay d-flex align-items-center">
                                                <div class="day-number">8</div>
                                                <div class="date-right">
                                                    <div class="day-name">Monday</div>
                                                    <div class="month">February 2018</div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="bullet bg-pink"></div>
                                                <div class="time">11am</div>
                                                <div class="desc">
                                                    <h3>Attendance</h3>
                                                    <h4>Computer Class</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="bullet bg-green"></div>
                                                <div class="time">12pm</div>
                                                <div class="desc">
                                                    <h3>Design Team</h3>
                                                    <h4>Hangouts</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="bullet bg-orange"></div>
                                                <div class="time">2pm</div>
                                                <div class="desc">
                                                    <h3>Finish</h3>
                                                    <h4>Go to Home</h4>
                                                </div>
                                            </li>
                                        </ul>
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
