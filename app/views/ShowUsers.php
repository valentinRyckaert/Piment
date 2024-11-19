<?php require_once("_header.php"); ?>
<?php use piment\utils\Auth; ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Utilisateurs</h1>
    <p class="text-center mb-5">Découvrez les utilisateurs disponibles dans notre système. Cliquez sur "Détails" pour en savoir plus sur chaque utilisateur.</p>
    <?php if(Auth::can(Auth::$CANCREATEUSER)) : ?>
        <div class="text-center m-5">
            <a href="/user/add/"><button class="btn btn-success">Ajouter un utilisateur</button></a>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Identifiant</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var $lesUsers array<\piment\models\User> */
                foreach($lesUsers as $lUtilisateur) { ?>
                    <tr>
                        <th scope='row'><?= $lUtilisateur->getId() ?></th>
                        <td><?= $lUtilisateur->getUsername() ?></td>
                        <td><?= $lUtilisateur->getLogin() ?></td>
                        <td class="justify-content-center">
                            <a href="/user/detail/<?= $lUtilisateur->getId() ?>" class="btn btn-success">Détails</a>
                        </td>
                        <?php if(Auth::can(Auth::$CANDELETEUSER)) : ?>
                            <td class="justify-content-center">
                                <a href="/user/delete/<?= $lUtilisateur->getId() ?>" class="btn btn-danger">Supprimer</a>
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
