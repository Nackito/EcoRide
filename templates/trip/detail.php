<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <h2>Détails du covoiturage</h2>
  <div class="card">
    <div class="card-header">
      <h3><?= htmlspecialchars($trip->getDeparture()) ?> à <?= htmlspecialchars($trip->getDestination()) ?></h3>
    </div>
    <div class="card-body">
      <img src="<?= htmlspecialchars($trip->getPhoto()) ?>" alt="Photo du conducteur" class="img-fluid">

      <p><strong>Date de départ :</strong> <?= htmlspecialchars($trip->getDateDepart()) ?></p>
      <p><strong>Heure de départ :</strong> <?= htmlspecialchars($trip->getHeureDepart()) ?></p>
      <p><strong>Date d'arrivée :</strong> <?= htmlspecialchars($trip->getDateArrivee()) ?></p>
      <p><strong>Heure d'arrivée :</strong> <?= htmlspecialchars($trip->getHeureArrivee()) ?></p>
      <p><strong>Durée :</strong> <?= htmlspecialchars($trip->getDuree()) ?></p>
      <p><strong>Statut :</strong> <?= htmlspecialchars($trip->getStatut()) ?></p>
      <p><strong>Nombre de places :</strong> <?= htmlspecialchars($trip->getNbPlace()) ?></p>
      <p><strong>Prix :</strong> <?= htmlspecialchars($trip->getPrice()) ?> €</p>
      <p><strong>Conducteur :</strong> <?= htmlspecialchars($trip->getPseudo()) ?></p>
      <p><strong>Note du conducteur :</strong> <?= htmlspecialchars($trip->getNote()) ?></p>
      <p><strong>Modèle de la voiture :</strong> <?= htmlspecialchars($trip->getModele()) ?></p>
      <p><strong>Énergie de la voiture :</strong> <?= htmlspecialchars($trip->getEnergie()) ?></p>
      <a href="/index.php?controller=trip&action=participate&id=<?= $trip->getId() ?>" class="btn btn-primary mt-3">Participer au covoiturage</a>
      <a href="/index.php?controller=trip&action=showReviews&id=<?= $trip->getUtilisateurId() ?>" class="btn btn-secondary mt-3">Afficher les avis du conducteur</a>
    </div>
  </div>
</div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>