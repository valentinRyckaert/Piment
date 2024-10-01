<?php require_once("_header.php"); ?>

<?php /** @var $laCaserne \piment\models\Caserne */ ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de la Caserne n°<?= $laCaserne->getNumCaserne() ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Adresse :</strong> <?= $laCaserne->getAdresse() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>CP :</strong> <?= $laCaserne->getCP() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Ville :</strong> <?= $laCaserne->getVille() ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Type de Caserne :</strong> <?= $laCaserne->getCodeTypeC() ?>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary col-3">Editer</button>
                    <button class="btn btn-danger col-3">Supprimer</button>
                    <a href="/caserne/show"><button class="btn btn-secondary col-3">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("_footer.php"); ?>
