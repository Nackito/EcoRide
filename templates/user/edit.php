<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Modifier les informations personnelles</h4>
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
            <input type="hidden" name="utilisateur_id" value="<?php echo $user->getId(); ?>">
            <div class="form-group">
              <label for="pseudo">Pseudo:</label>
              <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user->getPseudo()); ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>" required>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
              <label for="roles">Rôles:</label>
              <select class="form-control" id="roles" name="roles[]" multiple>
                <option value="chauffeur" <?php echo in_array('chauffeur', $user->getRoles()) ? 'selected' : ''; ?>>Chauffeur</option>
                <option value="passager" <?php echo in_array('passager', $user->getRoles()) ? 'selected' : ''; ?>>Passager</option>
              </select>
            </div>
            <div id="chauffeur-info" style="display: none;">
              <div class="form-group">
                <label for="immatriculation">Plaque d'immatriculation:</label>
                <input type="text" class="form-control" id="immatriculation" name="immatriculation">
              </div>
              <div class="form-group">
                <label for="date_premiere_immatriculation">Date de première immatriculation:</label>
                <input type="date" class="form-control" id="date_premiere_immatriculation" name="date_premiere_immatriculation">
              </div>
              <div class="form-group">
                <label for="modele">Modèle:</label>
                <input type="text" class="form-control" id="modele" name="modele">
              </div>
              <div class="form-group">
                <label for="couleur">Couleur:</label>
                <input type="text" class="form-control" id="couleur" name="couleur">
              </div>
              <div class="form-group">
                <label for="marque">Marque:</label>
                <input type="text" class="form-control" id="marque" name="marque">
              </div>
              <div class="form-group">
                <label for="nb_place">Nombre de places disponibles:</label>
                <input type="number" class="form-control" id="nb_place" name="nb_place">
              </div>
              <div class="form-group">
                <label for="preferences">Préférences:</label>
                <textarea class="form-control" id="preferences" name="preferences"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Mettre à jour</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('roles').addEventListener('change', function() {
    var chauffeurInfo = document.getElementById('chauffeur-info');
    if (this.value.includes('chauffeur')) {
      chauffeurInfo.style.display = 'block';
    } else {
      chauffeurInfo.style.display = 'none';
    }
  });
</script>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>