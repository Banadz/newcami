
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="demandeInfo" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form class="forms-sample" action="{{route('validationDemande')}}" id="formValidDem" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Information des demandes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">

                                <div class="card-body">
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <div class="page-header-title">
                                                        <i class="ik ik-navigation bg-blue"></i>
                                                        <div class="d-inline">
                                                            <h5>Demande</h5>
                                                            <span>Veuillez vérifier les quantités à accorder avant de valider.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <h6 id="ref_dem" title="ref">Reference</h6>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- <input type="text" class="form-control" name="ref_dem" id="ref_dem" placeholder="Reference n°2023/0001...."> --}}
                                    </div>
                                    <div class="dt-responsive">
                                        <table id="infoDem"
                                                class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Article</th>
                                                <th>Stock</th>
                                                <th>Qté demandé</th>
                                                @if (Auth::user()->TYPE == "Admin")
                                                <th>Qté accordé</th>
                                                @endif
                                                <th>Unité</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('imprimerDemande') }}" id="impressBtn" class="btn btn-success">Imprimer</a>

                            @if (Auth::user()->TYPE == "Admin")
                                <button type="submit" class="btn btn-primary">Valider</button>
                                <button type="button" target="{{ route('refuseDemande') }}" id="refuseDem" class="btn btn-warning">Refuser</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
