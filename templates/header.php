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
    <!-- Utilisation de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <!-- Styles personnalisés pour le thème écologique -->
    <link rel="stylesheet" href="../assets/css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>EcoRide</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">EcoRide</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/index.php?controller=home&action=show">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/index.php?controller=trip&action=create">Covoiturages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/index.php?controller=user&action=profile">Espace Utilisateur</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php if (Users::isLogged()) { ?>
                            <a href="/index.php?controller=user&action=logout" class="nav-link text-white">Se déconnecter</a>
                        <?php } else { ?>
                            <a href="/index.php?controller=user&action=login" class="nav-link text-white">Se connecter</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>