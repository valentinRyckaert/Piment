<?php require_once("_header.php"); ?>
<?php /** @var $csrf_token string */ ?>

<div class="container mt-5">
    <h2 class="mb-4">Créer un Utilisateur</h2>
    <form action="/user/save/" method="POST">
        <div class="form-group">
            <label for="login">Identifiant</label>
            <input type="text" class="form-control" id="login" name="login" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="passwdHash">Mot de Passe</label>
            <input type="password" class="form-control" id="passwdHash" name="passwdHash" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <input type="text" class="form-control" id="status" name="status" maxlength="50" required>
        </div>
        <div class="form-group">
            <label for="dateclosure">Date de Clôture</label>
            <input type="date" class="form-control" id="dateclosure" name="dateclosure">
        </div>
        <div class="form-group">
            <label for="profil_id">Profil</label>
            <select class="form-control" id="profil_id" name="profil_id">
                <!-- Remplir avec les profils disponibles -->
                <option value="">Sélectionner un profil</option>
                <?php foreach ($profils as $profil) : ?>
                    <option value="<?= $profil->getId() ?>"><?= $profil->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="role_id">Rôle</label>
            <select class="form-control" id="role_id" name="role_id">
                <!-- Remplir avec les rôles disponibles -->
                <option value="">Sélectionner un rôle</option>
                <?php foreach ($roles as $role) : ?>
                    <option value="<?= $role->getId() ?>"><?= $role->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <button type="submit" class="btn btn-success">Créer Utilisateur</button>
    </form>
</div>

<?php require_once("_footer.php"); ?>
