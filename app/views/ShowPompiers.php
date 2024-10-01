<?php require_once("_header.php"); ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Pompiers</h1>
    <p class="text-center mb-5">Découvrez les pompiers qui protègent notre communauté. Cliquez sur "Détails" pour en savoir plus sur chaque pompier.</p>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Numéro de Caserne</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var $lesPompiers array<\piment\models\Pompier> */
                foreach($lesPompiers as $lePompier) { ?>
                    <tr>
                        <th scope='row'><?= $lePompier->getMatricule() ?></th>
                        <td><?= $lePompier->getPrenom() ?></td>
                        <td><?= $lePompier->getNom() ?></td>
                        <td><?= $lePompier->getNumCaserne() ?></td>
                        <td class="text-center">
                            <a href="/pompier/demo/<?= $lePompier->getMatricule() ?>" class="btn btn-success">Détails</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once("_footer.php"); ?>