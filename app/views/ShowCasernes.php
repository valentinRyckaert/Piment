<?php
require_once("_header.php");
use piment\utils\Auth;
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Casernes</h1>
    <p class="text-center mb-5">Découvrez les casernes disponibles dans notre région. Cliquez sur "Détails" pour en savoir plus sur chaque caserne.</p>
    <?php if(Auth::can(Auth::$CANCREATECASERNE)) : ?>
        <div class="text-center m-5">
            <a href="/caserne/add/"><button class="btn btn-success">Ajouter une caserne</button></a>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">CP</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var $lesCasernes array<\piment\models\Caserne> */
                foreach($lesCasernes as $laCaserne) { ?>
                    <tr>
                        <th scope='row'><?= $laCaserne->getNumCaserne() ?></th>
                        <td><?= $laCaserne->getAdresse() ?></td>
                        <td><?= $laCaserne->getCP() ?></td>
                        <td class="justify-content-center">
                            <a href="/caserne/detail/<?= $laCaserne->getNumCaserne() ?>" class="btn btn-success">Détails</a>
                        </td>
                    <?php if(Auth::can(Auth::$CANUPDATECASERNE)) : ?>
                            <td class="justify-content-center">
                                <a href="#" class="btn btn-primary">éditer</a>
                            </td>
                    <?php endif; ?>
                    <?php if(Auth::can(Auth::$CANDELETECASERNE)) : ?>
                            <td class="justify-content-center">
                                <a href="/caserne/delete/<?= $laCaserne->getNumCaserne() ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                    <?php endif; ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once("_footer.php"); ?>