<?php require_once("_header.php"); ?>

<div class="container mt-5">
    <h2 class="mb-4">Créer un Pompier</h2>
    <form action="/pompier/save/" method="POST">
        <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" class="form-control" id="matricule" name="matricule" maxlength="7" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" maxlength="175">
        </div>
        <div class="form-group">
            <label for="chefAgret">Chef Agret</label>
            <input type="text" class="form-control" id="chefAgret" name="chefAgret" maxlength="1" >
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" maxlength="25">
        </div>
        <div class="form-group">
            <label for="dateNaissance">Date de Naissance</label>
            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance">
        </div>
        <div class="form-group">
            <label for="numCaserne">Numéro de Caserne</label>
            <input type="number" class="form-control" id="numCaserne" name="numCaserne">
        </div>
        <div class="form-group">
            <label for="codeGrade">Code Grade</label>
            <input type="text" class="form-control" id="codeGrade" name="codeGrade" maxlength="2">
        </div>
        <div class="form-group">
            <label for="matriculeRespo">Matricule Responsable</label>
            <input type="text" class="form-control" id="matriculeRespo" name="matriculeRespo" maxlength="7">
        </div>
        <button type="submit" class="btn btn-success">Créer Pompier</button>
    </form>
</div>

<?php require_once("_footer.php"); ?>
