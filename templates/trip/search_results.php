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
                  <th>Conducteur</th>
                  <th>Photo</th>
                  <th>Note</th>
                  <th>Nombre de places restantes</th>
                  <th>Prix</th>
                  <th>Date de départ</th>
                  <th>Date d'arrivée</th>
                  <th>Heure de départ</th>
                  <th>Heure d'arrivée</th>
                  <th>Ville de départ</th>
                  <th>Ville d'arrivée</th>
                  <th>Voyage écologique</th>
                  <th>Durée du trajet</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($trips as $trip): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($trip->getPseudo()); ?></td>
                    <td><img src="<?php echo htmlspecialchars($trip->getPhoto()); ?>" alt="Photo du conducteur" width="50"></td>
                    <td><?php echo htmlspecialchars($trip->getNote()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getNbPlace()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getPrice()); ?> euro(s)</td>
                    <td><?php echo htmlspecialchars($trip->getDateDepart()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDateArrivee()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getHeureDepart()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getHeureArrivee()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDeparture()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDestination()); ?></td>
                    <td><?php echo htmlspecialchars($trip->getEnergie() == 'électrique' ? 'Oui' : 'Non'); ?></td>
                    <td><?php echo htmlspecialchars($trip->getDuree()); ?></td>
                    <td>
                      <a href="/index.php?controller=trip&action=detail&trip_id=<?php echo $trip->getId(); ?>" class="btn btn-primary">Détails</a>
                      <a href="/index.php?controller=trip&action=accept&trip_id=<?php echo $trip->getId(); ?>" class="btn btn-success">Accepter</a>
                    </td>
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