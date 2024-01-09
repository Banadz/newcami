
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="multiAgentUpdate" tabindex="-1" role="dialog" aria-labelledby="multiAgentLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg" role="document">
                <form class="forms-sample" action="#" id="formEditMultiAgent" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier un agent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="matriculem">Matricule</label>
                                                <input type="text" required class="form-control" id="matriculem" name="matriculem">
                                            </div>
                                            <div class="form-group">
                                                <label for="nomm">Nom</label>
                                                <input type="text" required class="form-control" id="nomm" name="nomm">
                                            </div>
                                            <div class="form-group">
                                                <label for="prenomsm">Prenoms</label>
                                                <input type="text" class="form-control" id="prenomsm" name="prenomsm">
                                            </div>
                                            <div class="form-group">
                                                <label for="genrem">Genre</label>
                                                <select class="form-control" required id="genrem" name="genrem">
                                                    <option value="M">Masculin</option>
                                                    <option value="F">Feminin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="adressem">Adresse</label>
                                                <input type="text" class="form-control" id="adressem" name="adressem">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="divisionm">Division</label>
                                                <select class="form-control" required id="divisionm"
                                                name="divisionm">
                                                    @foreach ($divisions as $div)
                                                    <option value="{{$div->CODE_DIVISION}}">{{$div->CODE_DIVISION}} | {{$div->LABEL_DIVISION}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fonctionm">Fonction</label>
                                                <input type="text" class="form-control" required id="fonctionm" name="fonctionm">
                                            </div>
                                            <div class="form-group">
                                                <label for="portem">Porte N°</label>
                                                <input type="text" class="form-control" id="portem" name="portem">
                                            </div>
                                            <div class="form-group">
                                                <label for="emailm">Email</label>
                                                <input type="email" class="form-control" id="emailm" name="emailm">
                                            </div>
                                            <div class="form-group">
                                                <label for="telephonem">Téléphone</label>
                                                <input type="text" class="form-control" id="telephonem" required name="telephonem">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="button" data-dismiss="modal" class="btn btn-warning">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
