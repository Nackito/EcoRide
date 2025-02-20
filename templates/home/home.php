<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h4>Rechercher un covoiturage</h4>
        </div>
        <div class="card-body">
          <form method="GET" action="/index.php" class="mb-5">
            <input type="hidden" name="controller" value="trip">
            <input type="hidden" name="action" value="search">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="departure">Adresse de départ:</label>
                  <input type="text" class="form-control <?= (isset($errors['departure']) ? 'is-invalid' : '') ?>" id="departure" name="departure" placeholder="Ville de départ" required>
                  <?php if (isset($errors['departure'])) { ?>
                    <div class="invalid-feedback"><?= $errors['departure'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="destination">Adresse d'arrivée:</label>
                  <input type="text" class="form-control <?= (isset($errors['destination']) ? 'is-invalid' : '') ?>" id="destination" name="destination" placeholder="Ville de destination" required>
                  <?php if (isset($errors['destination'])) { ?>
                    <div class="invalid-feedback"><?= $errors['destination'] ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" class="form-control <?= (isset($errors['date']) ? 'is-invalid' : '') ?>" id="date" name="date">
                  <?php if (isset($errors['date'])) { ?>
                    <div class="invalid-feedback"><?= $errors['date'] ?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-block">Rechercher</button>
              </div>
            </div>
          </form>
          <div class="jumbotron bg-light p-5">
            <h1 class="display-4">EcoRide</h1>
            <p class="lead">Votre partenaire de covoiturage écologique.</p>
            <hr class="my-4">
            <p>Chez EcoRide, nous croyons en un avenir plus vert et plus durable. Notre mission est de réduire l'empreinte carbone en facilitant le covoiturage pour tous. Rejoignez-nous dans notre engagement pour un environnement plus propre.</p>
            <a class="btn btn-success btn-lg" href="/index.php?controller=trip&action=list" role="button">Voir les offres de covoiturage</a>
          </div>
          <div class="row mt-5">
            <div class="col-md-4">
              <div class="card">
                <img src="assets/images/image1.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                  <h5 class="card-title">Réduisez votre empreinte carbone</h5>
                  <p class="card-text">En partageant vos trajets, vous contribuez à la réduction des émissions de CO2.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <img src="assets/images/image2.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                  <h5 class="card-title">Économisez de l'argent</h5>
                  <p class="card-text">Le covoiturage est une solution économique pour vos déplacements quotidiens.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <img src="assets/images/image3.jpg" class="card-img-top" alt="Image 3">
                <div class="card-body">
                  <h5 class="card-title">Rencontrez de nouvelles personnes</h5>
                  <p class="card-text">Le covoiturage est une excellente occasion de rencontrer des personnes partageant les mêmes idées.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12">
              <div class="card bg-success text-white">
                <div class="card-body">
                  <h5 class="card-title">Notre engagement écologique</h5>
                  <p class="card-text">EcoRide s'engage à promouvoir des pratiques de transport durable et à sensibiliser le public à l'importance de la protection de l'environnement.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>