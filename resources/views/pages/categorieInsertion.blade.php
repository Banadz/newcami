<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Catégorie - Insertion</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

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
                            <div class="page-header">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            <i class="ik ik-grid bg-blue"></i>
                                            <div class="d-inline">
                                                <h5>Catégorie</h5>
                                                <span>Formulaire d'insertion d'une nouvelle categorie</span>
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
                                                    <a href="categorie">Catégorie</a>
                                                </li>
                                                <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header justify-content-between">
                                        <h3>Nouveau catégorie</h3>
                                        <a class="btn btn-success pull-right" href="categorie">Retour</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="forms-sample"  action="{{ route('insertionCategorie') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="compte">Compte</label>
                                                        <select class="form-control select2" name="compte" target="{{ route('recupDivisions') }}" id="compte">
                                                            @foreach ($comptes as $compte)
                                                            <option value="{{$compte->COMPTE }}" selected>{{$compte->COMPTE}} | {{$compte->LABEL_COMPTE}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="label_categorie">Designation catégorie</label>
                                                        <input type="text" class="form-control is-valid" id="label_categorie" name="label_categorie"
                                                        placeholder="Stylo" required>
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
                                                        <a href="compte" class="btn btn-danger btn-block">Annuler</a>
                                                    </div>
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
        @include('pages.partition.config')


        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="modules/jquery.repeater/jquery.repeater.min.js"></script>

        <script src="modules/select2/dist/js/select2.min.js"></script>
        <script src="modules/summernote/dist/summernote-bs4.min.js"></script>
        <script src="modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

        <script src="dist/js/theme.min.js"></script>
        <script src="js/forms.js"></script>


        <script src="js/form-advanced.js"></script>
    </body>
</html>
