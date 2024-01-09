<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Matériels - Historique</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/owl.carousel/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/owl.carousel/dist/assets/owl.theme.default.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/dist/css/theme.min.css">
        <script src="http://127.0.0.1:8000/src/js/vendor/modernizr-2.8.3.min.js"></script>
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
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-package bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Matériels</h5>
                                            <span>Historique d'un matériel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="dashbord"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="materiel">Matériel</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Historiques</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mb-4">Ancien(s) détenteur(s)</h5>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pl-0 pr-0">
                                        <div class="owl-container">
                                            <div class="owl-carousel basic">
                                                @foreach ($materiel->historiques as $histo)
                                                @if ($histo->MATRICULE !== NULL)
                                                <div class="card flex-row">
                                                    <div class="w-50 position-relative">
                                                        <img class="card-img-left" src="http://127.0.0.1:8000/images/portfolio-1.jpg" alt="Card image cap">
                                                        <span class="badge badge-pill badge-primary position-absolute badge-top-left">{{$histo->MATRICULE}}</span>
                                                    </div>
                                                    <div class="w-50">
                                                        <div class="card-body">
                                                            <h6 class="mb-4">{{$histo->agent->CODE_DIVISION}} <br> {{$histo->agent->NOM}} {{$histo->agent->PRENOM}}</h6>

                                                            <footer>
                                                                <p class="text-muted text-small mb-0 font-weight-light">Dépuis le {{$histo->DATE_DEB}}</p>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                @endforeach
                                                @if ( $materiel->MATRICULE !== NULL )
                                                <div class="card flex-row">
                                                    <div class="w-50 position-relative">
                                                        <img class="card-img-left" src="http://127.0.0.1:8000/images/portfolio-2.jpg" alt="Card image cap">
                                                        <span class="badge badge-pill badge-primary position-absolute badge-top-left">{{$materiel->MATRICULE}}</span>
                                                    </div>
                                                    <div class="w-50">
                                                        <div class="card-body">
                                                            <h6 class="mb-4">{{$materiel->agent->CODE_DIVISION}} <br>{{$materiel->agent->NOM}} {{$materiel->agent->PRENOM}}</h6>
                                                            <footer>
                                                                <p class="text-muted text-small mb-0 font-weight-light">Depuis {{$materiel->DATE_DEB}}</p>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="card flex-row">
                                                    <div class="w-50 position-relative">
                                                        <div class="card-body">
                                                            <h6 class="mb-4">
                                                                {{$materiel->sortie->REF_SORTIE}}
                                                            </h6>
                                                            <h6 class="mb-4">
                                                                Condamnation de {{$materiel->sortie->STATUT}}.
                                                            </h6>

                                                        </div>
                                                    </div>
                                                    <div class="w-50">
                                                        <div class="card-body">
                                                            <h6 class="mb-4">{{$materiel->ETAT_MAT}}</h6>
                                                            <footer>
                                                                <p class="text-muted text-small mb-0 font-weight-light">Dépuis {{$materiel->DATE_DEB}}</p>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="slider-nav text-center">
                                                <a href="#" class="left-arrow owl-prev">
                                                    <i class="ik ik-chevron-left"></i>
                                                </a>
                                                <div class="slider-dot-container"></div>
                                                <a href="#" class="right-arrow owl-next">
                                                    <i class="ik ik-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-4">Historique(s) d'état</h5>
                                <div class="row mb-4">
                                    <div class="col-md-12 mb-4 pl-0 pr-0">
                                        <div class="owl-container">
                                            <div class="owl-carousel single">
                                                @php
                                                   $dernierHisto = null;
                                                @endphp
                                                @foreach ($materiel->historiques as $histo)
                                                @if ($histo->MATRICULE == NULL)
                                                <div class="card d-flex flex-row">
                                                    <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                                        <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                            <a href="#">
                                                                <p class="list-item-heading mb-1 truncate">{{$histo->ETAT_MAT}}</p>
                                                            </a>
                                                            <p class="mb-0 text-muted text-small">Du {{$histo->DATE_DEB}}</p>
                                                            <p class="mb-0 text-muted text-small">au {{$histo->DATE_FIN}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $dernierHisto = $histo;
                                                @endphp
                                                @endif
                                                @endforeach
                                                <div class="card d-flex flex-row">
                                                    <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                                        <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                                            <a href="#">
                                                                <p class="list-item-heading mb-1 truncate">{{$materiel->ETAT_MAT}}</p>
                                                            </a>
                                                            <p class="mb-0 text-muted text-small">Du
                                                            @php
                                                                echo($dernierHisto->DATE_FIN);
                                                            @endphp</p>
                                                            <p class="mb-0 text-muted text-small">Actuellement</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="slider-nav text-center">
                                                <a href="#" class="left-arrow owl-prev">
                                                    <i class="ik ik-chevron-left"></i>
                                                </a>
                                                <div class="slider-dot-container"></div>
                                                <a href="#" class="right-arrow owl-next">
                                                    <i class="ik ik-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
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
        {{-- @include('pages.partition.config') --}}


        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="http://127.0.0.1:8000/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="http://127.0.0.1:8000/modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/owl.carousel/dist/owl.carousel.min.js"></script>

        <script src="http://127.0.0.1:8000/dist/js/theme.min.js"></script>

        <script src="http://127.0.0.1:8000/js/carousel.js"></script>


        {{-- MY JS --}}

        {{-- <script src="http://127.0.0.1:8000/modules/.personnel/Register.js"></script> --}}
        <script src="http://127.0.0.1:8000/modules/.personnel/materielOperation.js"></script>
    </body>
</html>
