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
                <div class="card-header text-center bg-danger text-white">
                    <h4>Détails de <?= htmlspecialchars($oneUser->getPrenom()) ?> <?= htmlspecialchars($oneUser->getNom()) ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group mt-3">
                        <li class="list-group-item">
                            <strong>ID :</strong> <?= htmlspecialchars($oneUser->getId()) ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Prénom :</strong> <?= htmlspecialchars($oneUser->getPrenom()) ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Nom :</strong> <?= htmlspecialchars($oneUser->getNom()) ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Email :</strong> <?= htmlspecialchars($oneUser->getEmail()) ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Date d'inscription :</strong> <?= htmlspecialchars($oneUser->getDateInscription()) ?>
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
            <a href="/user/list">
                <button class="btn btn-secondary">Annuler</button>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <form action="/user/delete/" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($oneUser->getId()) ?>">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
