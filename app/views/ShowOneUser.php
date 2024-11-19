<?php require_once("_header.php"); ?>
<?php /** @var $oneUser \piment\models\User */ ?>
<?php use piment\utils\Auth; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de <?= $oneUser->getName() ?> (<?= $oneUser->getUsername() ?>)</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
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
                        <li class="list-group-item">
                            <strong>ID de profil :</strong> <?= $oneUser->getProfil_id() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>ID de rôle :</strong> <?= $oneUser->getRole_id() ?>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <?php if(Auth::can(Auth::$CANDELETEUSER)) : ?>
                        <a href="/user/delete/<?= $oneUser->getId() ?>"><button class="btn btn-danger col-3">Supprimer</button></a>
                    <?php endif; ?>
                    <a href="/user/show"><button type="submit" class="btn btn-secondary col-3">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("_footer.php"); ?>
