<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<!-- Utilisation de Bootstrap pour le formulaire -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Créer un compte</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="register.php">
            <div class="form-group">
              <label for="pseudo">Pseudo:</label>
              <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Créer un compte</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>