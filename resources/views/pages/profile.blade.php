@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Profil - User
    @endsection
    @section('entete')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-file-text bg-blue"></i>
                    <div class="d-inline">
                        <h5>Profil</h5>
                        <span>Ici, c'est la page affichant le profil de l'utilisateur.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="insex"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('profil') }}">Profil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Info utilisateur</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="images/profil/{{ $agent->PHOTO }}" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{ $agent->PSEUDO }}</h4>
                            <p class="text-center d-md-inline-block">{{ $agent->FONCTION }} | {{ $agent->CODE_DIVISION }} | {{ $agent->division->CODE_SERVICE }}</p>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <small class="text-muted d-block">Adresse e-mail</small>
                        <h6>{{ $agent->EMAIL }}</h6>
                        <small class="text-muted d-block pt-10">Téléphone</small>
                        <h6>{{ $agent->TELEPHONE }}</h6>
                        <small class="text-muted d-block pt-10">Adresse Physique</small>
                        <h6>{{ $agent->ADRESSE_PHYSIQUE }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Paramètre</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <p class="mt-30">
                                    Voici les informations de base liées à votre compte Monsieur Andrianajoro.
                                </p>
                                <hr>
                                <form id="infoProfBase" method="POST" action="{{ route('updateUserProfilBase') }}" class="form-horizontal">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-name">Nom</label>
                                                <input type="text" placeholder="ANDRIANAJORO" value="{{ $agent->NOM }}"
                                                class="form-control" name="nomP" id="nomP">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="prenomP">Prénom(s)</label>
                                                <input type="text" placeholder="Pierre" value="{{ $agent->PRENOM }}"
                                                class="form-control" name="prenomP" id="prenomP">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Nom du compte</label>
                                        <input type="text" value="{{ $agent->PSEUDO }}"
                                        class="form-control" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="genreP">Genre</label>
                                        <select name="genreP" id="genreP" class="form-control">
                                            <option value="H">Homme</option>
                                            <option value="F">Femme</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="adresseP">Adresse physique</label>
                                        <input type="text" value="{{ $agent->ADRESSE_PHYSIQUE }}"
                                        class="form-control" name="adresseP" id="adresseP">
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <p class="mt-30">
                                    Quelques paramétrages en liaison avec votre compte.
                                </p>
                                <hr>
                                <form id="infoProfParam" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="mailP">Adresse e-mail</label>
                                        <input type="text" placeholder="xandrianajorobanadz@gmail.com" value="{{ $agent->EMAIL }}"
                                        class="form-control" name="mailP" id="mailP">
                                    </div>
                                    <div class="form-group">
                                        <label for="numeroP">Téléphone</label>
                                        <input type="text" placeholder="+261 34 38 079 86" value="{{ $agent->TELEPHONE }}"
                                        class="form-control" name="numeroP" id="numeroP">
                                    </div>
                                    <div class="form-group">
                                        <label for="motdeP">Mot de passe</label>
                                        <input type="password" value="12345687"
                                        class="form-control" name="motdeP" id="motdeP">
                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit">Changer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@section('updateModal')
        {{-- Update Modals --}}
        {{-- @include('pages.modals.demandeInfo') --}}
    @endsection

    @section('specialScript')
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/datatables.js"></script>

        <script src="modules/.personnel/agentOperation.js"></script>
    @endsection
