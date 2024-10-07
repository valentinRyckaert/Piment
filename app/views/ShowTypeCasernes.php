<?php require_once("_header.php"); ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Types de Caserne</h1>
        <p class="text-center mb-5">Découvrez les casernes disponibles dans notre région. Cliquez sur "Détails" pour en savoir plus sur chaque caserne.</p>
        <div class="text-center m-5">
            <a href="/typecaserne/add/"><button class="btn btn-success">Ajouter un type de caserne</button></a>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /** @var $lesTypeCasernes array<\piment\models\TypeCaserne> */
                    foreach($lesTypeCasernes as $leType) { ?>
                        <tr>
                            <th scope='row'><?= $leType->getCodeTypeC() ?></th>
                            <td><?= $leType->getNomType() ?></td>
                            <td class="justify-content-center">
                                <a href="/typecaserne/detail/<?= $leType->getCodeTypeC() ?>" class="btn btn-success">Détails</a>
                            </td>
                            <td class="justify-content-center">
                                <a href="#" class="btn btn-primary">éditer</a>
                            </td>
                            <td class="justify-content-center">
                                <a href="/typecaserne/delete/<?= $leType->getCodeTypeC() ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once("_footer.php"); ?>