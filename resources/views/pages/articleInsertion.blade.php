<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Article - Formulaire</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

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
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-box bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Article </h5>
                                            <span>Formulaire d'insertion d'un nouveau article</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="article">Article</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Données</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('insertionArticle') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <h3>Nouveau Article</h3>
                                            <a class="btn btn-success pull-right" href="article">Retour</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="compte">Compte</label>
                                                                <select class="form-control select2" name="compte" target="{{ route('recupCategorie') }}" id="compte">
                                                                    @foreach ($comptes as $compte)
                                                                    @if ($compte->COMPTE == "6111")
                                                                    <option value="{{$compte->COMPTE }}" selected>{{$compte->COMPTE}} | {{$compte->LABEL_COMPTE}}</option>
                                                                    @else
                                                                    <option value="{{$compte->COMPTE }}">{{$compte->COMPTE}} | {{$compte->LABEL_COMPTE}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="id_categorie">Catégorie</label>
                                                                <select class="form-control select2" name="id_categorie" id="id_categorie" required>
                                                                    @foreach ($categories as $categorie)
                                                                    <option value="{{ $categorie->id }}" class="choiceCategorie">{{ $categorie->id }} | {{$categorie->LABEL_CATEGORIE}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="designation">Désignation</label>
                                                                <input type="text" class="form-control is-valid" name="designation" id="designation"
                                                                placeholder="Stylo à bille" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="specification">Specification technique</label>
                                                                <input type="text" class="form-control is-valid" name="specification" id="specification"
                                                                placeholder="SCHNEIDER Rouge">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="unite">Unité</label>
                                                                <select class="form-control select2" name="unite" id="unite" required>
                                                                    <option value="Nombre" selected>Nombre</option>
                                                                    <option value="Boîte de 100">Boîte de 100</option>
                                                                    <option value="Boîte de 50">Boîte de 50</option>
                                                                    <option value="Killigrame(s)">Killigrame(s)</option>
                                                                    <option value="Mètre(s)">Mètre(s)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="slider-nav text-center">
                                                        <div class="card-body template-demo">
                                                            <a href="article" id="cancel" class="btn btn-warning cancel">Annuler</a>
                                                            <button type="submit" id="insert" class="btn btn-info sub">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <script src="modules/select2/dist/js/select2.js"></script>

        <script src="dist/js/theme.min.js"></script>
        {{-- MY JS --}}

        {{-- <script src="modules/.personnel/Register.js"></script> --}}
        <script src="modules/.personnel/articleOperation.js"></script>
    </body>
</html>
