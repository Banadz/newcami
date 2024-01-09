
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="multiAgentInsert" tabindex="-1" role="dialog" aria-labelledby="multiAgentLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg" role="document">
                <form class="forms-sample" action="#" id="formInsertMultiAgent" method="POST">
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
                                                <label for="matriculei">Matricule</label>
                                                <input type="text" class="form-control" id="matriculei"
                                                name="matriculei" maxlength="6" required placeholder="Matricule à 6 chiffres">
                                            </div>
                                            <div class="form-group">
                                                <label for="nomi">Nom</label>
                                                <input type="text" required class="form-control" id="nomi"
                                                name="nomi" placeholder="Nom de l'Agent">
                                            </div>
                                            <div class="form-group">
                                                <label for="prenomsi">Prenoms</label>
                                                <input type="text" class="form-control" id="prenomsi"
                                                name="prenomsi" placeholder="Prénoms de l'Agent">
                                            </div>
                                            <div class="form-group">
                                                <label for="genrei">Genre</label>
                                                <select class="form-control" required id="genrei" name="genrei">
                                                    <option value="M">Masculin</option>
                                                    <option value="F">Feminin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="adressei">Adresse</label>
                                                <input type="text" class="form-control" id="adressei"
                                                name="adressei" placeholder="Insérer un adresse">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="divisioni">Division</label>
                                                <select class="form-control" required id="divisioni"
                                                name="divisioni">
                                                    <option value="" selected>Veuillez choisir la division</option>
                                                    @foreach ($divisions as $div)
                                                    <option value="{{$div->CODE_DIVISION}}">{{$div->CODE_DIVISION}} | {{$div->LABEL_DIVISION}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fonctioni">Fonction</label>
                                                <input type="text" class="form-control" required id="fonctioni"
                                                name="fonctioni" placeholder="Insérer le fonction">
                                            </div>
                                            <div class="form-group">
                                                <label for="portei">Porte N°</label>
                                                <input type="text" class="form-control" id="portei"
                                                name="portei" placeholder="Indique le porte">
                                            </div>
                                            <div class="form-group">
                                                <label for="emaili">Email</label>
                                                <input type="email" class="form-control" id="emaili"
                                                name="emaili" placeholder="Saisisez l'adresse mail">
                                            </div>
                                            <div class="form-group">
                                                <label for="telephonei">Téléphone</label>
                                                <input type="text" required class="form-control" id="telephonei"
                                                name="telephonei" placeholder="Ecrire l'adresse téléphonique">
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
