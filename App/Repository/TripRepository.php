<?php

namespace App\Repository;

use App\Entity\Trip;
use App\Db\Mysql;

class TripRepository extends Repository
{
  private $pdo;

  public function __construct()
  {
    $mysql = Mysql::getInstance();
    $this->pdo = $mysql->getPDO();
  }

  public function save(Trip $trip)
  {
    $stmt = $this->pdo->prepare("INSERT INTO Covoiturage (date_depart, heure_depart, date_arrivee, heure_arrivee, statut, nb_place, utilisateur_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
      $trip->getDateDepart(),
      $trip->getHeureDepart(),
      $trip->getDateArrivee(),
      $trip->getHeureArrivee(),
      $trip->getStatut(),
      $trip->getNbPlace(),
      $trip->getUtilisateurId()
    ]);
  }
}
