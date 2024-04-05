
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="divisionUpdate" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="forms-sample" action="{{route('updatingDivision')}}" id="fromUpdateDivision" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier un division</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <h3>Information de base</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <form class="sample-form">
                                                        <div class="form-group">
                                                            <label for="">Service</label>
                                                            <select class="form-control" name="code_service" id="code_service">

                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="code_division">Code division</label>
                                                        <input type="text" class="form-control is-valid" name="code_division" id="code_division"
                                                        placeholder="SOLDE" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="label_division">Division</label>
                                                        <input type="text" class="form-control is-valid" name="label_division" id="label_division"
                                                        placeholder="Division de la Solde">
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
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

