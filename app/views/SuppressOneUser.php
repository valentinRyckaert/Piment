<?php require_once("_styles.php"); ?>
<?php /** @var $oneUser \piment\models\User */ ?>
<?php /** @var $csrf_token string */ ?>

<div class="text-center mb-3 mt-5">
    <h3 class="text-center">Voulez-vous supprimer cet utilisateur ?</h3>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de l'utilisateur : <?= $oneUser->getName() ?> (<?= $oneUser->getUsername() ?>)</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group mt-3">
                        <li class="list-group-item">
                            <strong>ID :</strong> <?= $oneUser->getId() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Login :</strong> <?= $oneUser->getLogin() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Nom :</strong> <?= $oneUser->getName() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Nom d'utilisateur :</strong> <?= $oneUser->getUsername() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Statut :</strong> <?= $oneUser->getStatus() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Date de clôture :</strong> <?= $oneUser->getDateClosure() ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <a href="/user/show">
                <button class="btn btn-secondary">Annuler</button>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <form action="/user/delete/" method="post">
                <input type="hidden" name="id" value="<?= $oneUser->getId() ?>">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
