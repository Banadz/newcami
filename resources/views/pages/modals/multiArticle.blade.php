
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="multiArticle" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                {{-- <form class="forms-sample" action="{{route('validationDemande')}}" id="formValidDem" method="POST">
                    @csrf --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fullwindowModalLabel">Importation des Article</h5>
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
                                                    <i class="ik ik-box bg-blue"></i>
                                                    <div class="d-inline">
                                                        <h5>Article</h5>
                                                        <span>
                                                            D'abord, importez un fichier Excel,
                                                            puis chargez et manipulez les données dans ce tableau,
                                                            enfin commencez l'insertion.
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <form action="{{ route('importerArticle') }}" enctype="multipart/form-data"
                                            id="apporterFIchierArticle" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Selectionner un fichier</label>
                                                    <input type="file" name="fichierExcelArticle" required class="file-upload-default">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control is-invalid file-upload-info" disabled placeholder="Un fichier .xlsx">
                                                        <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Choisir</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success" title="Charger le tableau" type="submit">Charger</button>
                                                <button class="btn btn-info" id="newMultiArticle" title="Insérer">Insérer</button>
                                                <button class="btn btn-warning clear" title="Vider" type="button">Vider</button>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                                <div class="dt-responsive">
                                    <table id="openFileArticle"
                                            class="table table-striped table-bordered nowrap" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Catégorie</th>
                                            <th>Désigantion</th>
                                            <th>Spécification</th>
                                            <th>Unité</th>
                                            <th>Options</th>
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
                        <button type="button" id="goMultiArticle" name="{{ route('insererMutliArticle') }}" class="btn btn-primary">Insérer</button>
                        <button type="button" data-dismiss="modal" class="btn btn-warning">Annuler</button>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
