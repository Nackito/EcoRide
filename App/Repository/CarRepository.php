<?php

namespace App\Repository;

use App\Entity\Car;
use App\Db\Mysql;
use PDO;

class CarRepository extends Repository
{

  public function findCarsByUserId($userId)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM Voiture WHERE utilisateur_id = ?");
    $stmt->execute([$userId]);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $carObjects = [];
    foreach ($cars as $car) {
      $carObj = new Car();
      $carObj->setId($car['voiture_id']);
      $carObj->setMarque($car['energie']);
      $carObj->setModele($car['modele']);
      $carObj->setCouleur($car['couleur']);
      $carObj->setImmatriculation($car['immatriculation']);
      $carObj->setUtilisateurId($car['utilisateur_id']);
      $carObjects[] = $carObj;
    }

    return $carObjects;
  }
}
