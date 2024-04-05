
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="agentUpdate" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="forms-sample" action="{{ route('updatingAgent') }}" id="fromUpdateAgent" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier un agent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header"><h3>Information de base</h3></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nom">Nom</label>
                                                        <input type="text" class="form-control is-valid" name="nom" id="nom">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="prenom">Prénoms</label>
                                                        <input type="text" class="form-control is-valid" name="prenom" id="prenom">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Genre</label>
                                                        <select class="form-control" name="genre" id="genre">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="adresse_physique">Adresse</label>
                                                        <input type="text" class="form-control is-valid" name="adresse_physique" id="adresse_physique">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="telephone">Téléphone</label>
                                                                <input type="text" class="form-control is-valid" id="telephone" name="telephone"
                                                                placeholder="+261 34 38 079 86">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label for="email">Adresse email</label>
                                                                <input type="text" class="form-control is-valid" id="email" name="email"
                                                                placeholder="Andrianajoro">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header"><h3>Information du compte</h3></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="matricule">Matricule</label>
                                                        <input type="text" class="form-control is-valid" id="matricule" name="matricule"
                                                        placeholder="123456" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pseudo">Compte</label>
                                                        <input type="text" class="form-control is-valid" id="pseudo" name="pseudo"
                                                        placeholder="Andrianajoro">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="type">Type</label>
                                                        <select class="form-control" name="type" id="type">
                                                            <option value="Super Admin">Administrateur</option>
                                                            <option value="Admin">Dépositaire</option>
                                                            <option value="User" selected>Détenteur</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fonction">Fonction</label>
                                                        <input type="text" class="form-control is-valid" id="fonction" name="fonction"
                                                        placeholder="Secrétaire">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="code_division">Division</label>
                                                        <select class="form-control" id="code_division" name="code_division">
                                                            {{-- @foreach ($divisions as $division)
                                                            <option value="{{$division->CODE_DIVISION}}">{{$division->CODE_DIVISION}} | {{$division->LABEL_DIVISION}}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
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
