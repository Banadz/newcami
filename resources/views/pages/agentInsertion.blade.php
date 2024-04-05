<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Agents - Formulaire</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="getAgents" content="{{ route('allAgent') }}">


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
                                        <i class="ik ik-users bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Agents</h5>
                                            <span>Formulaire d'insertion de nouveau agent</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="agent">Agent</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Insertion</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('insertionAgent') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <h3>Nouveau Agent</h3>
                                            <a class="btn btn-success pull-right" href="agent">Retour</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card s1">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="nom">Nom</label>
                                                                    <input type="text" class="form-control " name="nom" id="nom"
                                                                    placeholder="NOMENJANAHARY" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="prenom">Prénom(s)</label>
                                                                    <input type="text" class="form-control " name="prenom" id="prenom"
                                                                    placeholder="Pierre Andrianajoro">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Genre</label>
                                                                    <select class="form-control" name="genre" id="genre" required>
                                                                        <option value="F">Femme</option>
                                                                        <option value="M" selected>Homme</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="adresse_physique">Adresse physique</label>
                                                                    <input type="text" class="form-control " name="adresse_physique" id="adresse_physique"
                                                                    placeholder="Andrainjato, Fianarantsoa">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="email">Photo d'identité</label>
                                                                    <div class="input-group col-xs-12">
                                                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Importer votre photo">
                                                                        <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-primary" type="button">Import.</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">Adresse Mail</label>
                                                                    <input type="text" class="form-control " name="email" id="email"
                                                                    placeholder="xandrianajorobanadz@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="telephone">Téléphone</label>
                                                                    <input type="text" class="form-control " id="telephone" name="telephone"
                                                                    placeholder="+261 34 38 079 86" required title="Unique des chiffres, espace, le signe plus">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card s2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_service">Service</label>
                                                                    <select class="form-control select2" name="code_service" target="{{ route('recupDivisions') }}" id="code_service">
                                                                        @foreach ($services as $service)
                                                                        @if ($service->CODE_SERVICE == $code_service)
                                                                        <option value="{{$service->CODE_SERVICE }}" selected>{{$service->CODE_SERVICE}} | {{$service->LABEL_SERVICE}}</option>
                                                                        @else
                                                                        <option value="{{$service->CODE_SERVICE }}">{{$service->CODE_SERVICE}} | {{$service->LABEL_SERVICE}}</option>
                                                                        @endif
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="code_division">Division</label>
                                                                    <select class="form-control select2" name="code_division" required id="code_division">
                                                                        @foreach ($divisions as $division)
                                                                        <option value="{{$division->CODE_DIVISION }}" class="choiceDivision">{{$division->CODE_DIVISION}} | {{$division->LABEL_DIVISION}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="matricule">Matricule</label>
                                                                    <input type="text" class="form-control" id="matricule" name="matricule"
                                                                    placeholder="123456" required maxlength="6">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fonction">Fonction</label>
                                                                    <input type="text" class="form-control " id="fonction" name="fonction"
                                                                    placeholder="Secrétaire" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="pseudo">Pseudonyme</label>
                                                                    <input type="text" class="form-control " id="pseudo" name="pseudo"
                                                                    placeholder="Andrianajoro" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="type">Type</label>
                                                                    <select class="form-control" name="type" id="type" required>
                                                                        <option value="Super Admin">Administrateur</option>
                                                                        <option value="Admin">Dépositaire</option>
                                                                        <option value="User" selected>Détenteur</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="password">Mot de passe</label>
                                                                    <input type="password" class="form-control " id="password" name="password"
                                                                    placeholder="************" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="confpassword">Confirmer votre mot de passe</label>
                                                                    <input type="password" class="form-control " id="confpassword" name="confpassword"
                                                                    placeholder="************" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="slider-nav text-center">
                                                        <div class="card-body template-demo">
                                                            <a href="agent" id="cancel" class="btn btn-danger cancel">Annuler</a>
                                                            <button type="button" id="prev" class="btn btn-warning prev">Précedent</button>
                                                            <button type="button" id="next" class="btn btn-info next">Suivant</button>
                                                            <button type="submit" id="insert" class="btn btn-primary sub">Enregistrer</button>
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
        @include('pages.partition.config')


        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="modules/jquery.repeater/jquery.repeater.min.js"></script>


        <script src="modules/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="js/carousel.js"></script>

        <script src="modules/select2/dist/js/select2.min.js"></script>
        <script src="modules/summernote/dist/summernote-bs4.min.js"></script>
        <script src="modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="modules/jquery.repeater/jquery.repeater.min.js"></script>

        <script src="dist/js/theme.min.js"></script>
        <script src="js/forms.js"></script>


        <script src="js/form-advanced.js"></script>

        {{-- MY JS --}}

        <script src="modules/.personnel/Register.js"></script>
    </body>
</html>
