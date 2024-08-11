@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Agent - Liste
    @endsection
    @section('secialCss')
        <link rel="stylesheet" href="modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    @endsection
    @section('entete')
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>Agent</h5>
                            <span>Affiche la liste de(s) agent(s) déjà enregistré(s)</span>
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
                                <a href="agent">agent</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Liste</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h3>Liste d'agent enregistré</h3>
                        <div class="pull-right">
                            <a class="btn btn-success" id="polyInsertinAgent" href="recupDonneesAgent">
                                <i class="ik ik-download"></i>  Importer
                            </a>
                            <a class="btn btn-primary" href="newAgent">
                                <i class="ik ik-plus-circle"></i> Nouveau
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="data_table"
                                    class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>IM</th>
                                    <th>Nom et prenons</th>
                                    <th>Divions et Fonction</th>
                                    <th>Contact</th>
                                    <th>email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{$agent->MATRICULE}}</td>
                                        <td>{{$agent->NOM}} {{$agent->PRENOM}}</td>
                                        <td>{{$agent->division?->LABEL_DIVISION}} | {{$agent->FONCTION}}</td>
                                        <td>{{$agent->TELEPHONE}}</td>
                                        <td>{{$agent->EMAIL}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#" class="nav-link dropdown-toggle" href="#"
                                                    id="actionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"title="Plus">
                                                    <i class="ik ik-more-horizontal-"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="actionDropdown">
                                                    <a class="dropdown-item" data-toggle="tooltip" data-placement="top" href="{{ route('getAgent') }}" class="updateAgent" data-toggle="modal" data-target="#agentUpdate" title="Modifier"><i class="ik ik-edit-2"></i> <label>Modifier</label> </a>
                                                    <a class="dropdown-item" href="{{ route('getAgent') }}" id="reboot" data-toggle="tooltip" data-placement="top" title="Réinitialiser"><i class="ik ik-rotate-cw"></i> Réinitialiser</a>
                                                    <a class="dropdown-item" data-toggle="tooltip" data-placement="top" href="{{ route('getAgent') }}" title="Désactiver" id="disable"><i class="ik ik-shield-off"></i> Désactiver</a>
                                                    <a class="dropdown-item" data-toggle="tooltip" data-placement="top" href="{{ route('getAgent') }}" title="Activer" id="enable"><i class="ik ik-shield"></i> Activer</a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('updateModal')
        {{-- Update Modals --}}
        @include('pages.modals.multiAgent')
        @include('pages.modals.multiAgentUpdate')
        @include('pages.modals.multiAgentInsert')
        @include('pages.modals.agentUpdate')
    @endsection

    @section('specialScript')
        <script src="modules/screenfull/dist/screenfull.js"></script>
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/datatables.js"></script>

        {{-- MY JS --}}
        <script src="modules/.personnel/agentOperation.js"></script>
    @endsection

