<?php require_once("_header.php"); ?>
<?php print_r($_SESSION) ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bienvenue sur le Portail Piment</h1>
    <p class="text-center mb-5">Découvrez les casernes et les pompiers qui protègent notre communauté. Utilisez les boutons ci-dessous pour naviguer vers les sections correspondantes.</p>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card text-center mb-4">
                <div class="card-header bg-danger text-white">
                    <h5>Casernes</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Explorez toutes les casernes disponibles et apprenez-en plus sur leurs missions et leurs équipes.</p>
                    <a href="/caserne/show" class="btn btn-danger">Voir les casernes</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-center mb-4">
                <div class="card-header bg-danger text-white">
                    <h5>Pompiers</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Rencontrez les pompiers qui se battent chaque jour pour notre sécurité et découvrez leurs histoires.</p>
                    <a href="/pompier/affiche" class="btn btn-danger">Voir les pompiers</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col text-center">
            <h2>À propos de nous</h2>
            <p>Notre mission est de fournir des informations précises et à jour sur les casernes et les pompiers. Nous nous engageons à soutenir nos héros locaux.</p>
            <a href="#" class="btn btn-outline-danger">En savoir plus</a>
        </div>
    </div>
</div>

<?php require_once("_footer.php"); ?>