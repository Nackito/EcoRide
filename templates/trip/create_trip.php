<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Créer un nouveau voyage</h4>
        </div>
        <div class="card-body">
          <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach ($errors as $error): ?>
                  <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <form method="POST" action="">
            <div class="form-group">
              <label for="date_depart">Date de départ:</label>
              <input type="date" class="form-control" id="date_depart" name="date_depart" required>
            </div>
            <div class="form-group">
              <label for="heure_depart">Heure de départ:</label>
              <input type="time" class="form-control" id="heure_depart" name="heure_depart" required>
            </div>
            <div class="form-group">
              <label for="date_arrivee">Date d'arrivée:</label>
              <input type="date" class="form-control" id="date_arrivee" name="date_arrivee" required>
            </div>
            <div class="form-group">
              <label for="heure_arrivee">Heure d'arrivée:</label>
              <input type="time" class="form-control" id="heure_arrivee" name="heure_arrivee" required>
            </div>
            <div class="form-group">
              <label for="statut">Statut:</label>
              <input type="text" class="form-control" id="statut" name="statut" required>
            </div>
            <div class="form-group">
              <label for="nb_place">Nombre de places disponibles:</label>
              <input type="number" class="form-control" id="nb_place" name="nb_place" required>
            </div>
            <div class="form-group">
              <label for="car">Voiture:</label>
              <select class="form-control" id="car" name="car" required>
                <?php foreach ($cars as $car): ?>
                  <option value="<?php echo $car->getId(); ?>">
                    <?php echo $car->getMarque() . ' ' . $car->getModele() . ' (' . $car->getImmatriculation() . ')'; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Créer le voyage</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>