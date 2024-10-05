<?php require_once("_styles.php"); ?>
<?php /** @var $onePompier \piment\models\Pompier */ ?>

<div class="text-center mb-3 mt-5">
    <h3 class="text-center">Voulez-vous supprimer cette pompier ?</h3>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de <?= $onePompier->getPrenom() ?> <?= $onePompier->getNom() ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group mt-3">
                        <li class="list-group-item">
                            <strong>Matricule :</strong> <?= $onePompier->getMatricule() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Prénom :</strong> <?= $onePompier->getPrenom() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Nom :</strong> <?= $onePompier->getNom() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Chef Agret :</strong> <?= $onePompier->getChefAgret() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Date de naissance :</strong> <?= $onePompier->getDateNaissance() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Numéro de caserne :</strong> <?= $onePompier->getNumCaserne() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Code de grade :</strong> <?= $onePompier->getCodeGrade() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Matricule Respo :</strong> <?= $onePompier->getMatriculerespo() ?>
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
            <a href="/pompier/affiche">
                <button class="btn btn-secondary">Annuler</button>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <form action="/pompier/delete/" method="post">
                <input type="hidden" name="id" value="<?= $onePompier->getMatricule() ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
