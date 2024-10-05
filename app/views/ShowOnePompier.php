<?php require_once("_header.php"); ?>

<?php /** @var $onePompier \piment\models\Pompier */ ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de <?= $onePompier->getPrenom() ?> <?= $onePompier->getNom() ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
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
                <div class="card-footer text-center">
                    <button class="btn btn-primary col-3">Editer</button>
                    <a href="/pompier/delete/<?= $onePompier->getMatricule() ?>"><button class="btn btn-danger col-3">Supprimer</button></a>
                    <a href="/pompier/affiche"><button  type="submit" class="btn btn-secondary col-3">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("_footer.php"); ?>
