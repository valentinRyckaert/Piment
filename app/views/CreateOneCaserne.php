<?php require_once("_header.php"); ?>

<div class="container mt-5">
    <h2>Créer une Caserne</h2>
    <form action="/caserne/save/" method="POST">
        <div class="form-group">
            <label for="numCaserne">Numéro de Caserne</label>
            <input type="number" class="form-control" id="numCaserne" name="numCaserne" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" maxlength="60">
        </div>
        <div class="form-group">
            <label for="cp">Code Postal</label>
            <input type="text" class="form-control" id="cp" name="cp" maxlength="6">
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" maxlength="20">
        </div>
        <div class="form-group">
            <label for="codeTypeC">Code Type de Caserne</label>
            <input type="number" class="form-control" id="codeTypeC" name="codeTypeC">
        </div>
        <button type="submit" class="btn btn-success">Créer Caserne</button>
    </form>
</div>

<?php require_once("_footer.php"); ?>