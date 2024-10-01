<?php require_once("_header.php"); ?>

  <div class="col-4">
      <table class="table table-striped border border-2">
          <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Prenom</th>
              <th scope="col">Nom</th>
              <th scope="col">Numéro caserne</th>
              <th scope="col">Matricule</th>
              <th scope="col"></th>
          </tr>
          </thead>
          <tbody>
          <?php
          /** @var $lespompiers array<\piment\models\pompier> */
          foreach($lespompiers as $lePompier) { ?>
              <tr>
                  <th scope='row'><?= $lePompier->getMatricule() ?></th>
                  <td><?= $lePompier->getPrenom() ?></td>
                  <td><?= $lePompier->getNom() ?></td>
                  <td><?= $lePompier->getNumCaserne() ?></td>
                  <td><?= $lePompier->getCodeGrade() ?></td>
                  <td><?= $lePompier->getMatriculerespo() ?></td>
                  <td><a href="/caserne/detail/<?= $lePompier->getNumCaserne() ?>"><button class='btn btn-success'>détails</button></a></td>
              </tr>
          <?php } ?>
          </tbody>
      </table>
  </div>

<?php require_once("_footer.php"); ?>