@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Matériels - Liste
    @endsection
    @section('entete')
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-package bg-blue"></i>
                        <div class="d-inline">
                            <h5>Matériels</h5>
                            <span>Cette page affiche la liste des matériels déjà condamné</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Condamné(s)</li>
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
                            <div class="card-header"><h3>Liste des matériels</h3></div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link" href="newMateriel">Nouveau</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="enteredMateriel">Entré(s)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="materiel">Utilisé(s)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="outedMateriel">Sorties</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="data_table"
                                    class="table">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Réference</th>
                                    <th>Origine</th>
                                    <th>Classification</th>
                                    <th>Matéreil</th>
                                    <th>Date de sortie</th>
                                    <th>Etat</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materiels as $materiel)

                                        <tr>
                                            <td>{{ $materiel->id }}</td>
                                            <td>{{ $materiel->sortie->REF_SORTIE }}</td>
                                            <td>{{ $materiel->origine->ORIGINE }}</td>
                                            <td>{{ $materiel->nomenclature->NOMENCLATURE }} | {{ $materiel->nomenclature->DETAIL_NOM }} <br>
                                                {{ $materiel->categorie->COMPTE }} | {{ $materiel->categorie->LABEL_CATEGORIE }}</td>
                                            <td>{{ $materiel->DESIGN_MAT }}. {{ $materiel->SPEC_MAT }}</td>
                                            <td>{{ $materiel->sortie->DATE }}</td>
                                            <td>{{ $materiel->ETAT_MAT }}</td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="#" class="nav-link dropdown-toggle" href="#"
                                                        id="actionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" title="Plus">
                                                        <i class="ik ik-more-horizontal-"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="actionDropdown">

                                                        <a href="/materiel/historique/{{ $materiel->id }}" class="dropdown-item info"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Historique"><i class="ik ik-rotate-ccw"></i></a>

                                                        <a href="getCondamnation" class="dropdown-item info detailsButtom"
                                                        data-toggle="modal" data-target="#"
                                                        title="Détails de Condamnation" data-placement="bottom"><i class="ik ik-info"></i></a>

                                                        {{-- <a href="#" class="dropdown-item info" data-toggle="tooltip"
                                                        data-target="#condamnationInfo"><i class="ik ik-info"></a> --}}
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
                <!-- Language - Comma Decimal Place table end -->
            </div>
        </div>
    @endsection

    @section('updateModal')
        {{-- Update Modals --}}
        @include('pages.modals.condamnationInfo')
    @endsection

    @section('specialScript')
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/datatables.js"></script>

        <script src="modules/.personnel/materielOperation.js"></script>
    @endsection
