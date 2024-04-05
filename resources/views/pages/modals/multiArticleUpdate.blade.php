
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="multiArticleUpdate" tabindex="-1" role="dialog" aria-labelledby="multiArticleLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg" role="document">
                <form class="forms-sample" action="#" id="formEditMultiArticle" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullwindowModalLabel">Modifier un article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="categoriem">Categorie</label>
                                                <input type="text" required class="form-control" id="categoriem" name="categoriem">
                                            </div>
                                            <div class="form-group">
                                                <label for="designm">Désignation</label>
                                                <input type="text" required class="form-control" id="designm" name="designm">
                                            </div>
                                            <div class="form-group">
                                                <label for="specm">Spécification</label>
                                                <input type="text" class="form-control" id="specm" name="specm">
                                            </div>
                                            <div class="form-group">
                                                <label for="unitem">Unité</label>
                                                <input type="text" class="form-control" id="unitem" name="unitem">
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
