<?php /** @var $oneCaserne \piment\models\Caserne */ ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            </div>
        </div>
        <div class="col-4">
            <a href="/caserne/show"><button class="btn btn-secondary row">Annuler</button></a>
            <a href="/caserne/show"><button class="btn btn-danger row">Supprimer</button></a>
        </div>
    </div>
</div>