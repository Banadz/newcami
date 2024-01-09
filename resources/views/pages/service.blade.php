@extends('pages.layout.pagesLayout')
    @section('title')
        CAMI | Compte - Liste
    @endsection
    @section('entete')
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-shield bg-blue"></i>
                        <div class="d-inline">
                            <h5>Service</h5>
                            <span>Affiche la liste de(s) service(s) déjà enregistré(s)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="dashbord"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="service">Service</a>
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
                        <h3>Liste de Service</h3>
                        <a class="btn btn-primary pull-right" href="newService">Nouveau</a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>Code service</th>
                                    <th class="nosort">Service</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th class="nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    {{-- <td>SRSPHM</td> --}}
                                    <td>{{$service->CODE_SERVICE}}</td>
                                    <td>{{$service->LABEL_SERVICE}}</td>
                                    <td>{{$service->ADRESSE_SERVICE}}</td>
                                    <td>{{$service->ADRESSE_MAIL}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('getService') }}" data-toggle="modal" class="updateService" data-target="#fullwindowModal" title="Modifier"><i class="ik ik-edit-2"></i></a>
                                            <a href="{{ route('deleteService') }}" class="deleteService" title="Supprimer"><i class="ik ik-trash-2"></i></a>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('updateModal')
        {{-- Update Modals --}}
        @include('pages.modals.serviceUpdate')
    @endsection

    @section('specialScript')
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="http://127.0.0.1:8000/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="http://127.0.0.1:8000/modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="http://127.0.0.1:8000/modules/select2/dist/js/select2.js"></script>

        <script src="http://127.0.0.1:8000/dist/js/theme.min.js"></script>

        {{-- DATATABLE --}}
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <script src="modules/select2/dist/js/select2.min.js"></script>
        <script src="modules/jquery.repeater/jquery.repeater.min.js"></script>

        <script src="js/forms.js"></script>
        <script src="js/form-advanced.js"></script>

        <script src="js/datatables.js"></script>

        {{-- MY JS --}}
        <script src="modules/.personnel/serviceOperation.js"></script>
    @endsection
