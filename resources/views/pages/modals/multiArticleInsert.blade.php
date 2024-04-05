
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="multiArticleInsert" tabindex="-1" role="dialog" aria-labelledby="multiArticleLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg" role="document">
                <form class="forms-sample" action="#" id="formInsertMultiArticle" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Insert un article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="categoriei">Catégorie</label>
                                                <input type="text" class="form-control" id="categoriei"
                                                name="categoriei" maxlength="3" required placeholder="Numéro catégorie">
                                            </div>
                                            <div class="form-group">
                                                <label for="designi">Désigantion</label>
                                                <input type="text" required class="form-control" id="designi"
                                                name="designi" placeholder="Désignation">
                                            </div>
                                            <div class="form-group">
                                                <label for="speci">Spécification</label>
                                                <input type="text" class="form-control" id="speci"
                                                name="speci" placeholder="Spécification">
                                            </div>
                                            <div class="form-group">
                                                <label for="unitei">Unité</label>
                                                <input type="text" class="form-control" id="unitei"
                                                name="unitei" placeholder="Unité approprié">
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
