<div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">Soyez informez que la session sera redémarrée pour changer le mot de passe</p>
                <form id ="passform" action="" method="post" novalidate="novalidate">

                    <div class="row">
                        <div class="col-12">
                            
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nouveau Mot de Passe</label>
                                <input type="password" maxlength="8" placeholder="********" required class="form-control" id="newpass" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Confirmation</label>
                                <input type="password" maxlength="8" class="form-control" required placeholder="Confirmer votre mot de passe" id="confpass" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Valider</button>
                            </div>
                        </div>
                        <!-- <div class="col-12" id="xmonta">
                            <div class="form-group" >
                            </div>
                            
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>