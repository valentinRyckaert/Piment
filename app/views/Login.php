<?php require_once('_header.php')
/** @var $csrf_token string */ ?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Connexion</h4>
                </div>
                <div class="card-body">
                    <form action="/login" method="post">
                        <div class="mb-3">
                            <label for="user" class="form-label">Utilisateur</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Pas encore inscrit? <a href="#">Créer un compte</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('_footer.php') ?>