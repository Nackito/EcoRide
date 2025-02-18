<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>


<section class="text-green">
    <div class="container pt-5">
        <div class="clearfix">
            <img class="col-md-4 w-30 float-md-end mb-3 ms-md-3 img-monkey object-fit-scale" src="assets/images/monkey.svg" alt="Photo d'un petit singe" />
            <div class="text-align-center">
                <h1 class="p-2 fw-bolder">Découvrez un monde fascinante!</h1>
                <p>Le zoo de Dabou couvre une superficie de 80 ha.
                    Soixante ans après sa création, le zoo présente des espèces menacées
                    et assure des missions de conservation in situ et ex situ, de tranmission du savoir
                    grâce aux actions pédagogiques et de dveloppement de la recherche scientifique.
                    Premier zoo de loisir en Côte d'ivoire avec 150 000 par an, le zoo propose également
                    plusieurs attractions pour petits et grands: Le Safari train vous emmène photographier
                    les animaux sauvages, profitez également du restaurant et bien d'autres...
                    Une aventure exeptionnelle à Dabou à vivre en famille ou entre amis.</p>
            </div>
        </div>
    </div>
</section>
<!-- START: Présentation animals-->
<section class="container py-5 bg-success-subtle">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleDark" class="carousel data-bs-theme=" dark" slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="assets/images/Alapaga.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="roboto">L'alapaga</h5>
                            <p class="merriweather">L’alpaga est sur le circuit Jaune. C’est un animal domestique …</p>
                            <p class="merriweather">L’alpaga est sur le circuit Jaune. C’est un animal domestique …</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="assets/images/amazone-aile-orange.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="roboto">L'amazone à ailes orange</h5>
                            <p class="merriweather">L'amazone à ailes orange est sur le parcours Jaune. C'est un animal trés bruyant</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/La-grue-cou-blan.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="roboto">La grue à cou blan</h5>
                            <p class="merriweather">Les grues sont visibles sur le circuit Jaune. C'est un oiseau migrateur asiatique...</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body px-0 text-light">
                <p class="card-text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel aliquid maiores asperiores sint
                    doloribus eligendi odio nostrum quod, aperiam placeat eaque dolor libero provident beatae neque
                    obcaecati quidem tempore debitis.
                </p>
                <p><a href="/index.php?controller=animals&action=show" class="btn btn-order rounded-0 text-light text-uppercase merriweather">Les animaux du parc</a></p>
            </div>
        </div>
    </div>
</section>
<!--END: Présentation animals-->
<!--START: Présentation habitats et services-->
<section class=" py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col d-sm-none d-md-block">
                <div class="card">
                    <img src="assets/images/img-mini-ferme.png" class="card-img-top rounded-1" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title"><a href="/index.php?controller=habitats&action=details&id=2">La savane</a></h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to additional content. This
                            content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="assets/images/img-felin.png" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title"><a href="/index.php?controller=habitats&action=details&id=1">La jungle</a></h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to additional content. This
                            content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col d-sm-none d-md-block">
                <div class="card">
                    <img src="assets/images/Rhinoceros-indien.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title"><a href="/index.php?controller=habitats&action=details&id=3">Les marais</a></h5>
                        <p class="card-text">
                            This is a longer card with supporting text below as a natural lead-in to additional content.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="assets/images/le-petit-train.jpg" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title text-center"><a href="/index.php?controller=services&action=list">Nos services</a></h5>
                        <p class="card-text">
                            Dans un souci de toujours satisfaire les visiteurs, découvrez ce que le parc met à votre disposition.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END: Présentation habitats et services-->
<!--START: Avis-->

<section class="py-5">
    <div class="container avis rounded bg-success-subtle">
        <div class="row py-3">
            <div class="col-sm-5 roboto">
                <h1 class="center"><?= $avisTitle; ?></h1>
                <form action="index.php?controller=avis&action=addAvis" method="post" onsubmit="return showConfirmation()">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label"><?= $pseudo; ?></label>
                        <input type="text" class="form-control <?= (isset($errors['pseudo']) ? 'is-invalid' : '') ?>" id="pseudo" name="pseudo">
                        <?php if (isset($errors['pseudo'])) { ?>
                            <div class="invalid-feedback"><?= $errors['pseudo'] ?></div>
                        <?php } ?>
                    </div><br>
                    <div class="mb-3">
                        <label for="commentaire" class="form-label"><?= $commentaire; ?></label>
                        <textarea id="commentaire" name="commentaire" class="form-control <?= (isset($errors['commentaire']) ? 'is-invalid' : '') ?>" rows="6" cols="50"></textarea>
                        <?php if (isset($errors['commentaire'])) { ?>
                            <div class="invalid-feedback"><?= $errors['commentaire'] ?></div>
                        <?php } ?>
                    </div>

                    <input type="submit" name="addAvis" class="btn btn-primary" value="Soumettre">
                </form>
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-12">
                        <h1><?= $avisTitle2; ?></h1>
                        <div class="row">
                            <?php foreach ($avis as $avi): ?>
                                <div class="col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <p><?php echo $avi->getAvisId(); ?></p>
                                            <p class="card-title merienda"><?php echo htmlspecialchars($avi->getPseudo()); ?></p>
                                            <em class="card-text">" <?php echo htmlspecialchars($avi->getCommentaire()); ?> "</em>
                                            <p class="card-text"> <small class="text-mutetd">Date de l'expérience : <?php echo htmlspecialchars($avi->getDate()); ?> </small></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END: Avis-->

<script>
    function showConfirmation() {
        alert("Avis soumis, Merci et à bientot");
        return true; // Permet de soumettre le formulaire
    }
</script>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>