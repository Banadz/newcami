
<div class="row">
    <div class="col-md-12">
        <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="sample-form" action="{{route('updatingService')}}" id="fromUpdateService" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier un service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header justify-content-between">
                                                    <h3>Information de base</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Code</label>
                                                                <input type="text" class="form-control"
                                                                name="code_service" id="code_service" placeholder="SRSPHM" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail3">Service</label>
                                                                <input type="text" class="form-control"
                                                                name="label_service" id="label_service"
                                                                placeholder="Service Régional de la Solde et des Pensions Haute Matsiatra">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header"><h3>Contacts | Adresse</h3></div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="adresse_physique">Province</label>
                                                                <input type="text" class="form-control"
                                                                id="ville_service" name="ville_service"
                                                                placeholder="Fianarantsoa">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="adresse_physique">Adresse Physique</label>
                                                                <input type="text" class="form-control"
                                                                id="adresse_service" name="adresse_service"
                                                                placeholder="Andohanantady, Fianarantsoa">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Téléphone</label>
                                                                <input type="text" class="form-control"
                                                                id="contact_service" name="contact_service"
                                                                placeholder="+261 34 38 079 86">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">Adresse email</label>
                                                                <input type="text" class="form-control"
                                                                name="adresse_mail" id="adresse_mail"
                                                                placeholder="xandrianajorobanadz@gmail.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header justify-content-between">
                                                    <h3>Information Administrative</h3> <a class="btn btn-success pull-right" href="service">Retour</a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="sigle">Sigle</label>
                                                                <input type="text" class="form-control" name="sigle_service" id="sigle_service"
                                                                placeholder="SRSP-HM/2023/..">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-header"><h3>En-tête</h3></div>
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv1">Niveau 1</label>
                                                            <input type="text" class="form-control"
                                                            id="entete1" name="entete1"
                                                            placeholder="MINISTERE DES FINANCES">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv2">Niveau 2</label>
                                                            <input type="text" class="form-control"
                                                            id="entete2" name="entete2"
                                                            placeholder="DIRECTION GENERAL">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv3">Niveau 3</label>
                                                            <input type="text" class="form-control"
                                                            id="entete3" name="entete3"
                                                            placeholder="DIRECTION REGIONAL DES FINANCES">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv4">Niveau 4</label>
                                                            <input type="text" class="form-control"
                                                            id="entete4" name="entete4"
                                                            placeholder="DIRECTION GENERAL DES FINANCES ET DES AFFAIRES GENERALES">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="niv5">Niveau 5</label>
                                                            <input type="text" class="form-control"
                                                            id="entete5" name="entete5"
                                                            placeholder="SERVICE REGIONAL DE LA SOLDE ET DES PENSIONS">
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

