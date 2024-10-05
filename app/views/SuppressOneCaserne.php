<?php require_once("_styles.php"); ?>
<?php /** @var $oneCaserne \piment\models\Caserne */ ?>

<div class="text-center mb-3 mt-5">
    <h3 class="text-center">Voulez-vous supprimer cette caserne ?</h3>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Détails de la Caserne n°<?= $oneCaserne->getNumCaserne() ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group mt-3">
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
    </div>
</div>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <a href="/caserne/show">
                <button class="btn btn-secondary">Annuler</button>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <form action="/caserne/delete/" method="post">
                <input type="hidden" name="id" value="<?= $oneCaserne->getNumCaserne() ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>