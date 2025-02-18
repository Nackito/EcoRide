<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Espace Utilisateur</h4>
        </div>
        <div class="card-body">
          <p><strong>Pseudo :</strong> <?php echo htmlspecialchars($user->getPseudo()); ?></p>
          <p><strong>Email :</strong> <?php echo htmlspecialchars($user->getEmail()); ?></p>
          <p><strong>Crédits :</strong> <?php echo htmlspecialchars($user->getCredits()); ?></p>
          <a href="/index.php?controller=user&action=edit" class="btn btn-success">Modifier le profil</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>