<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Origine - Formulaire</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="getData" content="{{ route('allData') }}">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="modules/.personnel/css/vibreur.css">
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
        <script src="modules/sweetalert/sweetalert.min.js"></script>

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
                                        <i class="ik ik-sun bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Origine</h5>
                                            <span>Formulaire d'insertion d'un nouveau origine</span>
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
                                                <a href="#">Origine</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <form class="forms-sample putArtForm" action="" id="addArticle" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <h3>Nouveau Origine</h3>
                                            <a class="btn btn-success pull-right"
                                            data-toggle="modal" data-target="#pannier" title="Editer demandes"
                                                href="#"  id="voirDem"><i class="ik ik-clipboard"></i> Voir liste</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="id_origne">Origine</label>
                                                                <select class="form-control select2" name="id_origine" id="id_origine">
                                                                    @foreach ($services as $service )
                                                                    @if ($service->CODE_SERVICE == $code_service)
                                                                    <option value="{{$service->CODE_SERVICE}}" selected>{{$service->CODE_SERVICE}} | {{$service->LABEL_SERVICE}}</option>
                                                                    @else
                                                                    <option value="{{$service->CODE_SERVICE}}">{{$service->CODE_SERVICE}} | {{$service->LABEL_SERVICE}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="compte">Compte</label>
                                                                <select class="form-control select2" target="{{ route('recupCategorie') }}" name="compte" id="compte" required>
                                                                    <option class="choisirCompte" value="0" selected>Veuillez choisir un compte</option>
                                                                    @foreach ($comptes as $compte)
                                                                        <option value="{{ $compte->COMPTE }}">
                                                                            {{ $compte->COMPTE }} | {{$compte->LABEL_COMPTE}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="id_categorie">Categorie</label>
                                                                <select class="form-control select2" name="id_categorie" target="{{ route('recupArticle') }}" id="id_categorie">
                                                                    <option id="defaultCat" class="choiceCategorie" value="0" selected>Veuillez choisir une catégorie</option>
                                                                    @foreach ($categories as $categorie)
                                                                    {{-- @if ($categorie->id == "5") --}}
                                                                    {{-- @else --}}
                                                                    <option class="choiceCategorie" value="{{$categorie->id }}">{{$categorie->id}} | {{$categorie->LABEL_CATEGORIE}}</option>
                                                                    {{-- @endif --}}
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="article">Article</label>
                                                                <select class="form-control select2" name="article" id="article" required>
                                                                    <option id="defaultArt" class="choiceArticle" value="0" selected>Veuillez choisir un article</option>
                                                                    @foreach ($articles as $article)
                                                                        <option value="{{ $article->id }}" title="{{$article->DESIGNATION}}"
                                                                            class="choiceArticle" data-target="{{$article->SPECIFICATION}}">
                                                                            {{ $article->id }} | {{$article->DESIGNATION}} {{$article->SPECIFICATION}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="quantite">Quantité</label>
                                                                <input type="Number" target="{{route('controlQuant')}}" class="form-control"
                                                                name="quantite" id="quantite" placeholder="Effectif" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="unite">Unité</label>
                                                                <input type="text" class="form-control" name="unite" placeholder="Unité utilisé" id="unite" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="Prix_unitaire">Prix Unitaire</label>
                                                                <input type="Number" target="{{route('controlQuant')}}" class="form-control"
                                                                name="prix_unitaire" id="prix_unitaire" placeholder="Prix en Ariary">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Montant">Montant</label>
                                                                <input type="Number" class="form-control"
                                                                name="montant" id="montant" placeholder="Montant en Ariary">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="slider-nav text-center">
                                                        <div class="card-body template-demo">
                                                            <a href="article" id="cancel" class="btn btn-warning cancel">Annuler</a>
                                                            <button type="submit" target="{{route('controlQuant')}}" id="add" class="btn btn-info sub">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal fade full-window-modal" id="pannier" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="" target="{{ route('validOrigine')}}" method="post" id="toValide">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fullwindowModalLabel">Liste des Origines</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <div class="row align-items-end">
                                                            <div class="col-lg-8">
                                                                <div class="form-group">
                                                                    <div class="page-header-title">
                                                                        <i class="ik ik-sun bg-blue"></i>
                                                                        <div class="d-inline">
                                                                            <h5>Origine</h5>
                                                                            <span>Cette page affiche la liste de fournissement à ajouter</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="num">N° Facture</label>
                                                                    <input type="Text" class="form-control"
                                                                    name="facture" id="facture" placeholder="Saisissez le N° de Facture">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="dt-responsive">
                                                        <table id="alt-pg-dt"
                                                                class="table table-striped table-bordered nowrap" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Formule</th>
                                                                <th>Désignation</th>
                                                                <th>Specificité</th>
                                                                <th>Quantité</th>
                                                                <th>Unité</th>
                                                                <th>Prix Unitaire</th>
                                                                <th>Montant</th>
                                                                <th>Origine</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Formule</th>
                                                                    <th>Désignation</th>
                                                                    <th>Specificité</th>
                                                                    <th>Quantité</th>
                                                                    <th>Unité</th>
                                                                    <th>Prix Unitaire</th>
                                                                    <th>Montant</th>
                                                                    <th>Origine</th>
                                                                    <th></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Valider</button>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </form>
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
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="modules/select2/dist/js/select2.js"></script>

        <script src="dist/js/theme.min.js"></script>

        {{-- DATATABLE --}}
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/datatables.js"></script>

        {{-- MY JS --}}

        {{-- <script src="modules/.personnel/Register.js"></script> --}}
        <script src="modules/.personnel/origineOperation.js"></script>
    </body>
</html>
