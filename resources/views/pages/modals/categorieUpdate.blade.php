
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="categorieUpdate" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="forms-sample" action="{{route('updatingCategorie')}}" id="fromUpdateCategorie" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier une categorie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="compte">Compte</label>
                                        <select class="form-control select2" name="compte" target="{{ route('recupDivisions') }}" id="compte">
                                            {{-- @foreach ($comptes as $compte)
                                            <option value="{{$compte->COMPTE }}" selected>{{$compte->COMPTE}} | {{$compte->LABEL_COMPTE}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="id">Designation</label>
                                        <input type="text" class="form-control is-valid" id="id" name="id"
                                        placeholder="24">
                                        <input type="text" class="form-control is-valid" id="label_categorie" name="label_categorie"
                                        placeholder="Stylo" required>
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

