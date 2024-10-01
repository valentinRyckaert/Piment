<?php require_once("_header.php"); ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Casernes</h1>
    <p class="text-center mb-5">Découvrez les casernes disponibles dans notre région. Cliquez sur "Détails" pour en savoir plus sur chaque caserne.</p>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">CP</th>
                    <th scope="col"></th>
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
                        <td class="text-center">
                            <a href="/caserne/detail/<?= $laCaserne->getNumCaserne() ?>" class="btn btn-success">Détails</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once("_footer.php"); ?>