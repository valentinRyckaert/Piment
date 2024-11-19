<!doctype html>
<html lang="fr">
<?php require_once("_styles.php"); ?>
<body>
<?php use piment\utils\Auth; ?>
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
                    <a class="nav-link" <?= isset($_SESSION['user']) ? 'href="/caserne/show"' : 'href="#"' ?>>
                        Casernes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?= isset($_SESSION['user']) ? 'href="/pompier/affiche"' : 'href="#"' ?>>
                        Pompiers
                    </a>
                </li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php if(Auth::can(Auth::$CANREADUSER)) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/show">
                                Users
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li class="nav-item">
                    <?php /** @var $route string */ ?>
                    <form class="d-flex <?= isset($_SESSION['user']) ? '' : 'disabled' ?>" role="search" action="/<?= isset($route) ? $route : null ?>/showspecific" method="get">
                        <input class="form-control me-2" name="value" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="/logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
