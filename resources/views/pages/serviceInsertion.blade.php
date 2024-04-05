<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Service - Insertion</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="getServices" content="{{ route('allService') }}">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="modules/.personnel/css/vibreur.css">
        <link rel="stylesheet" href="modules/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="modules/summernote/dist/summernote-bs4.css">
        <link rel="stylesheet" href="modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="modules/mohithg-switchery/dist/switchery.min.css">

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
                                        <i class="ik ik-edit bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Service</h5>
                                            <span>Formulaire d'insertion de nouveau service</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="service">Service</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Insertion</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <form class="sample-form" action="{{route('insertionService')}}" id="addService" target="{{ route('getService') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header justify-content-between">
                                                    <h3>Information de base</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Code</label>
                                                                <input type="text" class="form-control"
                                                                name="code_service" id="code_service" placeholder="SRSPHM" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail3">Service</label>
                                                                <input type="text" class="form-control" required
                                                                name="label_service" id="label_service"
                                                                placeholder="Service Régional de la Solde et des Pensions Haute Matsiatra">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header"><h3>Contacts | Adresse</h3></div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Chef lieu</label>
                                                                <select class="form-control select2" name="ville_service" id="ville_service">
                                                                    <option value="Antananarivo">Antananarivo</option>
                                                                    <option value="Fianarantsoa">Fianarantsoa</option>
                                                                    <option value="Tulear">Tulear</option>
                                                                    <option value="Antsiranana">Antsiranana</option>
                                                                    <option value="Manakara">Manakara</option>
                                                                    <option value="Toamasina">Toamasina</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="adresse_physique">Adresse Physique</label>
                                                                <input type="text" class="form-control"
                                                                id="adresse_service" name="adresse_service"
                                                                placeholder="Andohanantady, Fianarantsoa" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Téléphone</label>
                                                                <input type="text" class="form-control"
                                                                id="contact_service" name="contact_service"
                                                                placeholder="+261 34 38 079 86">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Adresse email</label>
                                                                <input type="text" class="form-control"
                                                                name="adresse_mail" id="adresse_mail"
                                                                placeholder="xandrianajorobanadz@gmail.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header justify-content-between">
                                                    <h3>Information Administrative</h3> <a class="btn btn-success pull-right" href="service">Retour</a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="sigle">Sigle</label>
                                                                <input required type="text" class="form-control" name="sigle_service" id="sigle_service"
                                                                placeholder="SRSP-HM/2023/..">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-header"><h3>En-tête</h3></div>
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv1">Niveau 1</label>
                                                            <input type="text" class="form-control"
                                                            id="entete1" name="entete1"
                                                            placeholder="MINISTERE DES FINANCES">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv2">Niveau 2</label>
                                                            <input type="text" class="form-control"
                                                            id="entete2" name="entete2"
                                                            placeholder="DIRECTION GENERAL">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv3">Niveau 3</label>
                                                            <input type="text" class="form-control"
                                                            id="entete3" name="entete3"
                                                            placeholder="DIRECTION REGIONAL DES FINANCES">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv4">Niveau 4</label>
                                                            <input type="text" class="form-control"
                                                            id="entete4" name="entete4"
                                                            placeholder="DIRECTION GENERAL DES FINANCES ET DES AFFAIRES GENERALES">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv5">Niveau 5</label>
                                                            <input type="text" class="form-control"
                                                            id="entete5" name="entete5"
                                                            placeholder="SERVICE REGIONAL DE LA SOLDE ET DES PENSIONS">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-body template-demo">
                                        <button type="submit" class="btn btn-info btn-block">Insérer</button>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="card-body template-demo">
                                        <button type="button" class="btn btn-warning btn-block">Vider</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body template-demo">
                                        <a href="service" class="btn btn-danger btn-block">Annuler</a>
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

        <script src="modules/select2/dist/js/select2.min.js"></script>
        <script src="modules/jquery.repeater/jquery.repeater.min.js"></script>

        <script src="dist/js/theme.min.js"></script>
        <script src="js/forms.js"></script>


        <script src="js/form-advanced.js"></script>

        {{-- MY JS --}}
        <script src="modules/.personnel/serviceOperation.js"></script>
    </body>
</html>
