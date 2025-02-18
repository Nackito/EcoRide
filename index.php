<?php

use App\Db\Mysql;
use App\Controller\Controller;

require_once __DIR__ . '/vendor/autoload.php';

// Sécurise le cookie de session avec httponly
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => $_SERVER['SERVER_NAME'],
    'httponly' => true
]);

// Démarrage de la session
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Démarrer la session si elle n'est pas déjà active
}

//Permet de definir un chemin racine
define('_ROOTPATH_', __DIR__); // __DIR__ est une constante magique qui retourne le chemin du dossier courant

// Initialisation de la base de données
$mysql = Mysql::getInstance();
$pdo = $mysql->getPDO();

$controlleur = new Controller();
$controlleur->route();
