
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="compteUpdate" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="forms-sample" action="{{route('updatingcompte')}}" id="fromUpdateCompte" method="POST">
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
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="compte">Compte</label>
                                                        <input type="text" class="form-control is-valid" name="compte" id="compte" required
                                                        placeholder="6112">
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label for="label_compte">Desingation</label>
                                                        <input type="text" class="form-control is-valid" id="label_compte" name="label_compte"
                                                        placeholder="Fourniture de bureau">
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

