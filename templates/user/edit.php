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
            <button type="submit" class="btn btn-success btn-block">Mettre à jour</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>