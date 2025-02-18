<?php require_once _ROOTPATH_ . '/templates/header.php';

use App\Entity\Avis;

?>
<div class="container kanit">
  <h1><?php echo $pageTitle; ?></h1>

  <h2>Avis validés</h2>
  <?php if (!empty($avisValides)): ?>
    <div class="row">
      <?php foreach ($avisValides as $avi): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($avi->getPseudo()); ?></h5>
              <p class="card-text">" <?php echo htmlspecialchars($avi->getCommentaire()); ?> "</p>
              <p class="card-text">Date de l'expérience : <?php echo $avi->getDate(); ?></p>
              <form method="post" action="/index.php?controller=avis&action=inValidateAvis" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $avi->getAvisId(); ?>">
                <button type="submit" class="btn btn-success" onclick="return confirm('Êtes-vous sûr de vouloir retirer cet avis ?');">Retirer</button>
              </form>
              <form method="post" action="/index.php?controller=avis&action=delete" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $avi->getAvisId(); ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p>Aucun avis validé disponible.</p>
  <?php endif; ?>

  <h2>Avis en attente de validation</h2>
  <?php if (!empty($avisEnAttente)): ?>
    <div class="row">
      <?php foreach ($avisEnAttente as $avi): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($avi->getPseudo()); ?></h5>
              <p class="card-text">" <?php echo htmlspecialchars($avi->getCommentaire()); ?> "</p>
              <form method="post" action="/index.php?controller=avis&action=validateAvis" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $avi->getAvisId(); ?>">
                <button type="submit" class="btn btn-success" onclick="return confirm('Êtes-vous sûr de vouloir valider cet avis ?');">Valider</button>
              </form>
              <form method="post" action="/index.php?controller=avis&action=delete" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $avi->getAvisId(); ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p>Aucun avis en attente de validation disponible.</p>
  <?php endif; ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>