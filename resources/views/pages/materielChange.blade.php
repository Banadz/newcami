<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CAMI | Matériels - Modification</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/.personnel/css/vibreur.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/summernote/dist/summernote-bs4.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/mohithg-switchery/dist/switchery.min.css">


        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/owl.carousel/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/owl.carousel/dist/assets/owl.theme.default.css">

        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/dist/css/theme.min.css">
        <script src="http://127.0.0.1:8000/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/sweetalert/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full-window-modal" aria-labelledby="fullwindowModalLabel">
                            <div class="modal-dialog" role="document">
                                <form class="forms-sample" action="/materiel/changement/{{$materiel->id}}" id="fromUpdateAgent" method="post">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fullwindowModalLabel">Changer le détenteur</h5>
                                            <a href="http://127.0.0.1:8000/materiel" type="button"><span aria-hidden="true">&times;</span></a>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="page-header">
                                                    <div class="row align-items-end">
                                                        <div class="col-lg-8">
                                                            <div class="page-header-title">
                                                                <div class="d-inline">
                                                                    <h5>Réference : {{$materiel->REF_MAT}}</h5>
                                                                    <span>{{$materiel->DESIGN_MAT}} | {{$materiel->SPEC_MAT}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 1%">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="card task-board">
                                                                    <div class="card-header">
                                                                        <h3>Information de base du matériel</h3>
                                                                        <div class="card-header-right">
                                                                            <ul class="list-unstyled card-option">
                                                                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                                                                <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                                                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                                                                <li><i class="ik ik-x close-card"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body todo-task">
                                                                        <div class="dd" data-plugin="nestable">
                                                                            <ol class="dd-list">
                                                                                <li class="dd-item" data-id="1">
                                                                                    <div class="dd-handle">
                                                                                        <h6>Actuel détenteur</h6>
                                                                                        <p>
                                                                                            Division: {{$materiel->agent->division->CODE_DIVISION}} - {{$materiel->agent->division->LABEL_DIVISION}} <br>
                                                                                            Agent: {{$materiel->agent->MATRICULE}} - {{$materiel->agent->NOM}} {{$materiel->agent->PRENOM}} <br>
                                                                                            Depuis: {{$materiel->DATE_DEB}}
                                                                                        </p>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="dd-item" data-id="2">
                                                                                    <div class="dd-handle">
                                                                                        <h6>Matériel</h6>
                                                                                        <p>
                                                                                            Ref: {{$materiel->REF_MAT}} <br>
                                                                                            Matériel: {{$materiel->DESIGN_MAT}}. {{$materiel->SPEC_MAT}}
                                                                                        </p>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="dd-item" data-id="3">
                                                                                    <div class="dd-handle">
                                                                                        <h6>Classification</h6>
                                                                                        <p>
                                                                                            Nomenclature: {{$materiel->nomenclature->NOMENCLATURE}} | {{$materiel->nomenclature->DETAIL_NOM}} <br>
                                                                                            Compte: {{$materiel->categorie->compte->COMPTE}} | {{$materiel->categorie->compte->LABEL_COMPTE}} <br>
                                                                                            Catégorie: {{$materiel->categorie->id}} | {{$materiel->categorie->LABEL_CATEGORIE}}
                                                                                        </p>
                                                                                    </div>
                                                                                </li>
                                                                            </ol>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card">
                                                                    <div class="card-header"><h3>Transcription</h3></div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="reference">Réference matériel</label>
                                                                                            <input type="text" value="{{$materiel->REF_MAT}}" class="form-control form-control-center is-valid" name="reference" id="reference"
                                                                                            placeholder="SRSP-HM/2023/ORD/05" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group">
                                                                                            <label for="etat">Etat du matériel</label>
                                                                                            <select class="form-control select2" name="etat" id="etat" required>
                                                                                                @foreach ($etats as $etat)
                                                                                                @if ($etat == $materiel->ETAT_MAT)
                                                                                                <option value="{{ $etat }}" selected>{{ $etat }}</option>
                                                                                                @else
                                                                                                <option value="{{ $etat }}">{{ $etat }}</option>
                                                                                                @endif
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="division">Division</label>
                                                                                            <select class="form-control select2" name="division" target="{{ route('recupAgent') }}" id="division" required>
                                                                                                @foreach ($divisions as $division)
                                                                                                @if ($division->CODE_DIVISION == $code_division)
                                                                                                <option value="{{ $division->CODE_DIVISION }}" selected class="chooseDiv">
                                                                                                    {{ $division->CODE_DIVISION }} | {{$division->LABEL_DIVISION}}
                                                                                                </option>
                                                                                                @else
                                                                                                <option value="{{ $division->CODE_DIVISION }}" class="chooseDiv">
                                                                                                    {{ $division->CODE_DIVISION }} | {{$division->LABEL_DIVISION}}
                                                                                                </option>
                                                                                                @endif

                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="matricule">Détenteur</label>
                                                                                            <select class="form-control select2" name="matricule" id="matricule" required>
                                                                                                <option value="" selected class="chooseDet">
                                                                                                    Veuillez choisir le détenteur
                                                                                                </option>
                                                                                                @foreach ($agents as $agent)
                                                                                                <option value="{{ $agent->MATRICULE }}" class="chooseDet">
                                                                                                    {{ $agent->MATRICULE }} | {{$agent->NOM}} {{$agent->PRENOM}}
                                                                                                </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <label for="dateDeb">Date de début</label>
                                                                                            <input class="form-control" type="datetime-local" value="{{$now}}" name="dateDeb" id="dateDeb" required/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            <a href="http://127.0.0.1:8000/enteredMateriel" type="button" class="btn btn-warning" data-dismiss="modal">Annuler</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- IMPORT --}}
        {{-- @include('pages.partition.config') --}}


        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="http://127.0.0.1:8000/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="http://127.0.0.1:8000/modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/select2/dist/js/select2.js"></script>

        <script src="http://127.0.0.1:8000/dist/js/theme.min.js"></script>

        {{-- DATATABLE --}}
        <script src="http://127.0.0.1:8000/modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="http://127.0.0.1:8000/js/datatables.js"></script>
        {{-- MY JS --}}

        {{-- <script src="http://127.0.0.1:8000/modules/.personnel/Register.js"></script> --}}
        <script src="http://127.0.0.1:8000/modules/.personnel/materielOperation.js"></script>

        <script src="http://127.0.0.1:8000/modules/nestable/jquery.nestable.js"></script>
        <script src="http://127.0.0.1:8000/js/taskboard.js"></script>

    </body>
</html>
