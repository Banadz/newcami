@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Compte - Liste
    @endsection
    @section('entete')
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-server bg-blue"></i>
                        <div class="d-inline">
                            <h5>Compte</h5>
                            <span>Affiche la liste de(s) compte(s) déjà enregistré(s)</span>
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
                                <a href="compte">Compte</a>
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
                        <h3>Liste des comptes</h3>
                        <a class="btn btn-primary pull-right" href="newCompte">Nouveau</a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="scr-vrt-dt"
                                class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Compte</th>
                                    <th>Designation</th>
                                    <th>Catégorie</th>
                                    <th>Article</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($comptes as $compte)

                                <tr>
                                    <td>{{ $compte->COMPTE }}</td>
                                    <td>{{ $compte->LABEL_COMPTE }}</td>
                                    <td>Contient 36 catégorie(s)</td>
                                    <td>Contient 108 article(s)</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="#" class="updateCompte"
                                            data-toggle="modal" data-target="#compteUpdate" title="Modifier">
                                                <i class="ik ik-edit-2"></i>
                                            </a>
                                            <a href="{{ route('deleteCompte') }}" class="deleteCompte" title="Supprimer"><i class="ik ik-trash-2"></i></a>
                                            <a href="#" class="nav-link dropdown-toggle" href="#"
                                                id="actionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"title="Plus">
                                                <i class="ik ik-more-horizontal-"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="actionDropdown">
                                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach



                            </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Code</th>
                                        <th>Division</th>
                                        <th>Service</th>
                                        <th>Agent</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('updateModal')
        {{-- Update Modals --}}
        @include('pages.modals.compteUpdate')
    @endsection

    @section('specialScript')
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <script src="js/datatables.js"></script>
        {{-- MY JS --}}
        <script src="modules/.personnel/compteOperation.js"></script>
    @endsection
