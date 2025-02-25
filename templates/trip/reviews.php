<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <h2>Avis du conducteur</h2>
  <?php if (empty($reviews)): ?>
    <p>Aucun avis trouvé pour ce conducteur.</p>
  <?php else: ?>
    <div class="list-group">
      <?php foreach ($reviews as $review): ?>
        <div class="list-group-item">
          <h5 class="mb-1"><?= htmlspecialchars($review['pseudo']) ?></h5>
          <p class="mb-1"><?= htmlspecialchars($review['commentaire']) ?></p>
          <small>Note : <?= htmlspecialchars($review['note']) ?>/5</small>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <a href="javascript:history.back()" class="btn btn-secondary mt-3">Retour</a>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>