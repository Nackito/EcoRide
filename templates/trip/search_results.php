<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Résultats de la recherche</h4>
        </div>
        <div class="card-body">
          <?php if (empty($trips)): ?>
            <p>Aucun covoiturage trouvé pour les critères de recherche spécifiés.</p>
          <?php else: ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Lieu de départ</th>
                  <th>Lieu d'arrivée</th>
                  <th>Date de départ</th>
                  <th>Heure de départ</th>
                  <th>Détails</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($trips as $trip): ?>
                  <tr>
                    <td><?= htmlspecialchars($trip->getDeparture()) ?></td>
                    <td><?= htmlspecialchars($trip->getDestination()) ?></td>
                    <td><?= htmlspecialchars($trip->getDateDepart()) ?></td>
                    <td><?= htmlspecialchars($trip->getHeureDepart()) ?></td>
                    <td><a href="/index.php?controller=trip&action=detail&id=<?= $trip->getId() ?>" class="btn btn-primary">Voir les détails</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>