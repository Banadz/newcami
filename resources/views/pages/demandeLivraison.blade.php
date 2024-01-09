@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Demande - Liste
    @endsection
    @section('entete')
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-navigation bg-blue"></i>
                        <div class="d-inline">
                            <h5>Demande</h5>
                            <span>Cette page affiche la liste de demande</span>
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
                                <a href="demandeLivring">Demande</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">En livraison</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <div class="card">
                            <div class="card-header"><h3>Liste des demandes</h3></div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link" href="newDemande">Nouveau</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="demande">En attente de validation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  active" href="livringDemande">En attente de livarison</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="LivredDemande">Livré(s)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="deniedDemande">Refusé(s)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="demandeW"
                                    class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Réference</th>
                                    <th>Agent</th>
                                    <th>Fonction</th>
                                    <th>Date</th>
                                    <th>Contenu(s)</th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($references as $reference)

                                        <tr>
                                            <td>{{ $reference->REFERENCE }}</td>
                                            <td>{{ $reference->agent->MATRICULE }} | {{ $reference->agent->PRENOM }}</td>
                                            <td>{{ $reference->agent->FONCTION }} | {{ $reference->agent->division->CODE_DIVISION }}</td>
                                            <td>{{ $reference->DATE_DEMANDE }}</td>
                                            <td>2 demande(s)</td>
                                            <td>
                                                @if (Auth::user()->TYPE == "User")
                                                    {{ $reference->ETAT }}
                                                @else
                                                    <div class="table-actions">
                                                        <a href="{{ route('sameRefDemande') }}" class="info" data-toggle="modal" data-target="#demandeInfo" title="Details"><i class="ik ik-info"></i></a>
                                                    </div>
                                                @endif
                                            </td>



                                        </tr>

                                    @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Language - Comma Decimal Place table end -->
            </div>
        </div>
    @endsection

    @section('updateModal')
        {{-- Update Modals --}}
        @include('pages.modals.demandeInfo')
    @endsection

    @section('specialScript')
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/datatables.js"></script>

        <script src="modules/.personnel/demandeOperation.js"></script>
    @endsection
