<?php require_once("_header.php"); ?>
      <div class="col-4">
          <table class="table table-striped border border-2">
              <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">CP</th>
                  <th scope="col"></th>
              </tr>
              </thead>
              <tbody>
              <?php
              /** @var $lesCasernes array<\piment\models\Caserne> */
              foreach($lesCasernes as $laCaserne) { ?>
                      <tr>
                          <th scope='row'><?= $laCaserne->getNumCaserne() ?></th>
                          <td><?= $laCaserne->getAdresse() ?></td>
                          <td><?= $laCaserne->getCP() ?></td>
                          <td><a href="/caserne/detail/<?= $laCaserne->getNumCaserne() ?>"><button class='btn btn-success'>détails</button></a></td>
                      </tr>
              <?php } ?>
              </tbody>
          </table>
      </div>

<?php require_once("_footer.php"); ?>