@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Categorie - Liste
    @endsection
    @section('entete')
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-box bg-blue"></i>
                        <div class="d-inline">
                            <h5>Article</h5>
                            <span>Cette page affiche la totalité de l'article enregistré</span>
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
                                <a href="article">Article</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Données</li>
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
                        <h3>Liste d'artcle enregistré</h3>
                        <div class="pull-right">
                            <a class="btn btn-info" href="newOrigine"><i class="ik ik-plus-circle"></i>Ajouter</a>
                            <a class="btn btn-success" id="polyInsertinArticle" href="recupDonneesArticle"><i class="ik ik-folder-plus"></i>Importer</a>
                            <a class="btn btn-primary" href="newArticle"><i class="ik ik-download"></i> Nouveau</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="alt-pg-dt"
                                    class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Formule</th>
                                    <th>Catégorie</th>
                                    <th>Article</th>
                                    <th>Quantité</th>
                                    <th>Unité</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)

                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>{{ $article->categorie->LABEL_CATEGORIE }}</td>
                                            <td>{{ $article->DESIGNATION }} {{ $article->SPECIFICATION }}</td>
                                            <td>{{ $article->EFFECTIF  }}</td>
                                            <td>{{ $article->UNITE }}</td>
                                            <td>
                                                <div class="table-actions">
                                                    <a href="/article/{{ $article->id }}" class="" title="Modifier">
                                                        <i class="ik ik-edit-2"></i>
                                                    </a>
                                                    {{-- <a href="/addition/{{ $article->id }}" title="Ajouter">
                                                        <i class="ik ik-plus-circle"></i>
                                                    </a> --}}
                                                    <a href="#" title="Supprimer"><i class="ik ik-trash-2"></i></a>
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
                                        <th>Formule</th>
                                        <th>Catégorie</th>
                                        <th>Article</th>
                                        <th>Quantité</th>
                                        <th>Unité</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
        @include('pages.modals.articleUpdate')
        @include('pages.modals.multiArticle')
        @include('pages.modals.multiArticleUpdate')
        @include('pages.modals.multiArticleInsert')
    @endsection

    @section('specialScript')
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/datatables.js"></script>
        {{-- MY JS --}}

        <script src="http://127.0.0.1:8000/modules/.personnel/articleOperation.js"></script>
    @endsection
