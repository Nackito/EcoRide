<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Offres de Covoiturages Disponibles</h4>
        </div>
        <div class="card-body">
          <?php if (empty($trips)): ?>
            <p>Aucune offre de covoiturage disponible.</p>
          <?php else: ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Ville de depart</th>
                  <th>Date de départ</th>
                  <th>Heure de départ</th>
                  <th>Ville d'arrivée</th>
                  <th>Date d'arrivée</th>
                  <th>Heure d'arrivée</th>
                  <th>Statut</th>
                  <th>Nombre de places</th>
                  <th>Prix par place</th>
                  <th>Voiture</th>
                  <th>Conducteur</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($trips as $trip): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($trip->getDeparture()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDateDepart()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getHeureDepart()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDestination()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDateArrivee()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getHeureArrivee()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getStatut()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getNbPlace()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getPrice()); ?> euro(s)</td>
                    <td><?php echo htmlspecialchars($trip->getModele()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getPseudo()); ?></td>
                    <th>
                      <a href="/index.php?controller=trip&action=accept&trip_id=<?php echo $trip->getId(); ?>" class="btn btn-success">Accepter</a>
                    </th>
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