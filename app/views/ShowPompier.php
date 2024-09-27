<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
      <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ShowData</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5" style="background-color: #e3f2fd;">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown
                      </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                  </li>
              </ul>
              <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
          </div>
      </div>
  </nav>
  <div class="col-4">
      <table class="table table-striped border border-2">
          <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Prenom</th>
              <th scope="col">Nom</th>
              <th scope="col">Chef Agret</th>
              <th scope="col">Date de naissance</th>
              <th scope="col">Numéro caserne</th>
              <th scope="col">code grade</th>
              <th scope="col">Matricule</th>
              <th scope="col"></th>
              <th scope="col"></th>
          </tr>
          </thead>
          <tbody>
          <?php
          /** @var $lespompiers array<\piment\models\pompier> */
          foreach($lespompiers as $lepompier) { ?>
              <tr>
                  <th scope='row'>$lepompier->getMatricule()</th>
                  <td><?= $lepompier->getPrenom() ?></td>
                  <td><?= $lepompier->getNom() ?></td>
                  <td><?= $lepompier->getChefAgret() ?></td>
                  <td><?= $lepompier->getDateNaissance() ?></td>
                  <td><?= $lepompier->getNumCaserne() ?></td>
                  <td><?= $lepompier->getCodeGrade() ?></td>
                  <td><?= $lepompier->getMatriculerespo() ?></td>
                  <td><button class='btn btn-primary'>edit</button></td>
                  <td><button class='btn btn-danger'>delete</button></td>
              </tr>
          <?php } ?>
          </tbody>
      </table>
  </div>
  </body>
</html>