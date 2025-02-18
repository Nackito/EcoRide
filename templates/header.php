<?php

use App\Entity\Users;
use App\Security\Security;
use App\Tools\NavigationTools;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>


    <nav class="cc-navbar navbar navbar-expand-lg py-0 text-uppercase w-100">
        <div class="container">
            <img class="me-5 imghead"
                src="assets/images/Logo.svg"
                alt="Logo du Zoo de Dabou" />
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
                <ul class=" navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item pe-4">
                        <a class="nav-link active" href="/index.php?controller=home&action=show">Accueil</a>
                    </li>
                    < class="nav-item pe-4">
                        <a class="nav-link active" href="/index.php?controller=services&action=list">Accès aux covoiturages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/index.php?controller=page&action=contacts">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/index.php?controller=dashboard&action=homeDashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/index.php?controller=avis&action=show">Gerer les avis</a>
                        </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php if (Users::isLogged()) { ?>
                            <a href="/index.php?controller=auth&action=logout" class="nav-link">Se déconnecter</a>
                        <?php } else { ?>
                            <a href="/index.php?controller=auth&action=login" class="nav-link">Se connecter</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>