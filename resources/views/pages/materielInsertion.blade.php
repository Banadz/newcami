<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Matériels - Formulaire</title>
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
                                        <i class="ik ik-package bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Matériels</h5>
                                            <span>Formulaire d'insertion d'un nouveau matériel</span>
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
                                                <a href="materiel">Matériels</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <form class="forms-sample motivationMat" id="#addMateriel" action="" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <div class="card">
                                                <div class="card-header justify-content-between">
                                                    <h3>Nouveau matériel</h3>
                                                    <a class="btn btn-success pull-right"
                                                    data-toggle="modal" data-target="#materiels" title="Liste de matériels"
                                                     href="#"  id="voirMat"><i class="ik ik-clipboard"></i> Voir matériels</a>

                                                </div>
                                                <div class="card-body">
                                                    <ul class="nav nav-pills nav-fill">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="newMateriel">Nouveau</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="enteredMateriel">Entré(s)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="materiel">Utilisé(s)</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="outedMateriel">Sorties</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
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
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="id_nomenclature">Nomenclature</label>
                                                                <select class="form-control select2" name="id_nomenclature" id="id_nomenclature" required>
                                                                    @foreach ($nomenclatures as $nomenclature)
                                                                    <option value="{{ $nomenclature->id }}" class="choiceNomenclature" title="{{ $nomenclature->NOMENCLATURE }}">{{ $nomenclature->NOMENCLATURE }} | {{$nomenclature->DETAIL_NOM}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="compte">Compte</label>
                                                                <select class="form-control is-valid select2" name="compte" target="{{ route('recupCategorie') }}" id="compte">
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
                                                        <div class="col-sm-6">
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
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="designation">Désignation</label>
                                                                        <input type="text" class="form-control form-control-center is-valid" name="designation" id="designation"
                                                                        placeholder="Table en bois de pin" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="quantite">Quantité</label>
                                                                        <input type="number" class="form-control form-control-center is-valid"
                                                                        name="quantite" id="quantite" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="prix_unitaire">Prix unitaire</label>
                                                                        <input type="text" class="form-control form-control-center is-valid"
                                                                        name="prix_unitaire" id="prix_unitaire" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="specification">Specification technique</label>
                                                                        <textarea class="form-control form-control-center is-valid" id="specification" rows="4"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12" style="margin-top: 2%">
                                                                    <div class="form-group">
                                                                        <label for="montant">Montant</label>
                                                                        <input type="text" class="form-control form-control-center is-valid"
                                                                        name="montant" id="montant" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="slider-nav text-center">
                                                        <div class="card-body template-demo">
                                                            <a href="article" id="cancel" class="btn btn-warning cancel">Annuler</a>
                                                            <button type="submit" id="ajouter" class="btn btn-info sub">Ajouter</button>
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
                                <div class="modal fade full-window-modal" id="materiels" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="" target="{{ route('valideMateriel')}}" method="post" id="toValideMateriel">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fullwindowModalLabel">Liste de matéreils à insérer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <div class="row align-items-end">
                                                            <div class="col-lg-8">
                                                                <div class="page-header-title">
                                                                    <i class="ik ik-package bg-blue"></i>
                                                                    <div class="d-inline">
                                                                        <h5>Matériels</h5>
                                                                        <span>Cette page affiche la liste des matériels à insérer</span>
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
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="dt-responsive">
                                                                <table id="insererMat"
                                                                        class="table table-striped table-bordered nowrap" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Origine</th>
                                                                        <th>Nomenclature</th>
                                                                        <th>Désignation</th>
                                                                        <th>Specificité</th>
                                                                        <th>Quantité</th>
                                                                        <th>Prix</th>
                                                                        <th>Montant</th>
                                                                        <th>Catégorie</th>
                                                                        <th>id_nomenclature</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>Origine</th>
                                                                            <th>Nomenclature</th>
                                                                            <th>Désignation</th>
                                                                            <th>Specificité</th>
                                                                            <th>Quantité</th>
                                                                            <th>Prix</th>
                                                                            <th>Montant</th>
                                                                            <th>Catégorie</th>
                                                                            <th>id_nomenclature</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
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
        <script src="modules/.personnel/materielOperation.js"></script>
    </body>
</html>
