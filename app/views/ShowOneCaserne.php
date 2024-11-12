<?php
require_once("_header.php");
use \piment\utils\Auth;
/** @var $oneCaserne \piment\models\Caserne */
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de la Caserne n°<?= $oneCaserne->getNumCaserne() ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Adresse :</strong> <?= $oneCaserne->getAdresse() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>CP :</strong> <?= $oneCaserne->getCP() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Ville :</strong> <?= $oneCaserne->getVille() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Type de Caserne :</strong> <?= $oneCaserne->getCodeTypeC() ?>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <?php if(Auth::can(Auth::$CANUPDATECASERNE)) : ?>
                        <button class="btn btn-primary col-3">Editer</button>
                    <?php endif; ?>
                    <?php if(Auth::can(Auth::$CANDELETECASERNE)) : ?>
                        <a href="/caserne/delete/<?= $oneCaserne->getNumCaserne() ?>"><button class="btn btn-danger col-3">Supprimer</button></a>
                    <?php endif; ?>
                    <a href="/caserne/show"><button class="btn btn-secondary col-3">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("_footer.php"); ?>
