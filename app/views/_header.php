<!doctype html>
<html lang="fr">
<?php require_once("_styles.php"); ?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= isset($_SESSION['user']) ? '/' : '#' ?>">
            <img src="/images/logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-middle">
            Piment
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/caserne/show" <?= isset($_SESSION['user']) ? '' : 'aria-disabled="true"' ?> >
                        Casernes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pompier/affiche" <?= isset($_SESSION['user']) ? '' : 'aria-disabled="true"' ?>>
                        Pompiers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" <?= isset($_SESSION['user']) ? '' : 'aria-disabled="true"' ?>>
                        Grades
                    </a>
                </li>
                <?php /** @var $route string */ ?>
                <form class="d-flex" role="search" action="/<?= isset($route) ? $route : null ?>/showspecific" method="get">
                    <input class="form-control me-2" name="value" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </ul>
        </div>
    </div>
</nav>
