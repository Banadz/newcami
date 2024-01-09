
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="articleUpdate" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="forms-sample" action="{{ route('updatingAgent') }}" id="fromUpdateAgent" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier un article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header justify-content-between">
                                            <h3>Nouveau Article</h3>
                                            <a class="btn btn-success pull-right" href="article">Retour</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="compte">Compte</label>
                                                                <select class="form-control select2" name="compte" target="{{ route('recupCategorie') }}" id="compte">
                                                                    @foreach ($comptes as $compte)
                                                                    @if ($compte->COMPTE == "6111")
                                                                    <option value="{{$compte->COMPTE }}" selected>{{$compte->COMPTE}} | {{$compte->LABEL_COMPTE}}</option>
                                                                    @else
                                                                    <option value="{{$compte->COMPTE }}">{{$compte->COMPTE}} | {{$compte->LABEL_COMPTE}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="id_categorie">Catégorie</label>
                                                                <select class="form-control select2" name="id_categorie" id="id_categorie" required>
                                                                    @foreach ($categories as $categorie)
                                                                    <option value="{{ $categorie->id }}" class="choiceCategorie">{{ $categorie->id }} | {{$categorie->LABEL_CATEGORIE}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="designation">Désignation</label>
                                                                <input type="text" class="form-control is-valid" name="designation" id="designation"
                                                                placeholder="Stylo à bille" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="specification">Specification technique</label>
                                                                <input type="text" class="form-control is-valid" name="specification" id="specification"
                                                                placeholder="SCHNEIDER Rouge">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="unite">Unité</label>
                                                                <select class="form-control select2" name="unite" id="unite" required>
                                                                    <option value="Nombre" selected>Nombre</option>
                                                                    <option value="Boîte de 100">Boîte de 100</option>
                                                                    <option value="Boîte de 50">Boîte de 50</option>
                                                                    <option value="Killigrame(s)">Killigrame(s)</option>
                                                                    <option value="Mètre(s)">Mètre(s)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="slider-nav text-center">
                                                        <div class="card-body template-demo">
                                                            <a href="article" id="cancel" class="btn btn-warning cancel">Annuler</a>
                                                            <button type="submit" id="insert" class="btn btn-info sub">Enregistrer</button>
                                                        </div>
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
