<?php

namespace App\Repository;

use App\Entity\Trip;
use App\Db\Mysql;
use App\Tools\StringTools;
use PDO;

class TripRepository extends Repository
{

  public function cancel($tripId)
  {
    $stmt = $this->pdo->prepare("DELETE FROM Covoiturage WHERE covoiturage_id = ?");
    $stmt->execute([$tripId]);
  }

  public function findByUserId($userId)
  {
    $stmt = $this->pdo->prepare("SELECT c.*, u.pseudo, v.modele, v.energie 
                              FROM Covoiturage c
                              LEFT JOIN Utilisateur u ON c.utilisateur_id = u.utilisateur_id
                              LEFT JOIN Voiture v ON c.voiture_id = v.voiture_id
                              WHERE c.utilisateur_id = ?
                              ORDER BY date_depart ASC");
    $stmt->execute([$userId]);
    $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tripObjects = [];
    foreach ($trips as $trip) {
      $tripObj = new Trip();
      $tripObj->setId($trip['covoiturage_id']);
      $tripObj->setDateDepart($trip['date_depart']);
      $tripObj->setHeureDepart($trip['heure_depart']);
      $tripObj->setDateArrivee($trip['date_arrivee']);
      $tripObj->setHeureArrivee($trip['heure_arrivee']);
      $tripObj->setStatut($trip['statut']);
      $tripObj->setNbPlace($trip['nb_place']);
      $tripObj->setPrice($trip['prix']);
      $tripObj->setUtilisateurId($trip['utilisateur_id']);
      $tripObj->setCarId($trip['voiture_id']);
      $tripObj->setPseudo($trip['pseudo']);
      $tripObj->setModele($trip['modele']);
      $tripObjects[] = $tripObj;
    }

    return $tripObjects;
  }

  public function findParticipantsByTripId($tripId)
  {
    $stmt = $this->pdo->prepare("SELECT u.* FROM Utilisateur u JOIN Participation p ON u.utilisateur_id = p.utilisateur_id WHERE p.covoiturage_id = ?");
    $stmt->execute([$tripId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function save(Trip $trip)
  {
    $stmt = $this->pdo->prepare("INSERT INTO Covoiturage (lieu_depart, date_depart, heure_depart, lieu_arrive, date_arrivee, heure_arrivee, statut, nb_place, prix, utilisateur_id, voiture_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
      $trip->getDeparture(),
      $trip->getDateDepart(),
      $trip->getHeureDepart(),
      $trip->getDestination(),
      $trip->getDateArrivee(),
      $trip->getHeureArrivee(),
      $trip->getStatut(),
      $trip->getNbPlace(),
      $trip->getPrice(),
      $trip->getUtilisateurId(),
      $trip->getCarId()
    ]);
  }

  public function findById($tripId)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM Covoiturage WHERE covoiturage_id = ?");
    $stmt->execute([$tripId]);
    $trip = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($trip) {
      $tripObj = new Trip();
      $tripObj->setId($trip['covoiturage_id']);
      $tripObj->setDeparture($trip['departure']);
      $tripObj->setDateDepart($trip['date_depart']);
      $tripObj->setHeureDepart($trip['heure_depart']);
      $tripObj->setDestination($trip['destination']);
      $tripObj->setDateArrivee($trip['date_arrivee']);
      $tripObj->setHeureArrivee($trip['heure_arrivee']);
      $tripObj->setStatut($trip['statut']);
      $tripObj->setNbPlace($trip['nb_place']);
      $tripObj->setPrice($trip['prix']);
      $tripObj->setUtilisateurId($trip['utilisateur_id']);
      $tripObj->setCarId($trip['car_id']);
      $tripObj->setPseudo($trip['pseudo']);
      $tripObj->setModele($trip['modele']);
      return $tripObj;
    }

    return null;
  }

  public function findAll()
  {
    $stmt = $this->pdo->prepare("SELECT c.*, u.pseudo, v.modele, v.energie 
                              FROM Covoiturage c
                              LEFT JOIN Utilisateur u ON c.utilisateur_id = u.utilisateur_id
                              LEFT JOIN Voiture v ON c.voiture_id = v.voiture_id
                              ORDER BY date_depart ASC");
    $stmt->execute();
    $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tripObjects = [];
    foreach ($trips as $trip) {
      $tripObj = new Trip();
      $tripObj->setId($trip['covoiturage_id']);
      $tripObj->setDeparture($trip['lieu_depart']);
      $tripObj->setDateDepart($trip['date_depart']);
      $tripObj->setHeureDepart($trip['heure_depart']);
      $tripObj->setDestination($trip['lieu_arrive']);
      $tripObj->setDateArrivee($trip['date_arrivee']);
      $tripObj->setHeureArrivee($trip['heure_arrivee']);
      $tripObj->setStatut($trip['statut']);
      $tripObj->setNbPlace($trip['nb_place']);
      $tripObj->setPrice($trip['prix']);
      $tripObj->setUtilisateurId($trip['utilisateur_id']);
      $tripObj->setCarId($trip['voiture_id']);
      $tripObj->setPseudo($trip['pseudo']);
      $tripObj->setModele($trip['modele']);
      $tripObjects[] = $tripObj;
    }

    return $tripObjects;
  }

  public function findByRouteAndDate($departure, $destination, $date)
  {
    $stmt = $this->pdo->prepare("SELECT c.*, u.pseudo, u.photo, u.note, v.modele, v.energie, c.nb_place
                                FROM Covoiturage c
                                LEFT JOIN Utilisateur u ON c.utilisateur_id = u.utilisateur_id
                                LEFT JOIN Voiture v ON c.voiture_id = v.voiture_id
                                WHERE c.lieu_depart = :depart AND c.lieu_arrive = :arrivee AND c.date_depart = :date
                                ORDER BY c.heure_depart ASC");
    // Execution et récupération des resultats
    $stmt->bindValue(':depart', $departure, PDO::PARAM_STR);
    $stmt->bindValue(':arrivee', $destination, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->execute();
    $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tripObjects = [];
    foreach ($trips as $trip) {
      $tripObj = new Trip();
      $tripObj->setId($trip['covoiturage_id']);
      $tripObj->setDeparture($trip['lieu_depart']);
      $tripObj->setDateDepart($trip['date_depart']);
      $tripObj->setHeureDepart($trip['heure_depart']);
      $tripObj->setDestination($trip['lieu_arrive']);
      $tripObj->setDateArrivee($trip['date_arrivee']);
      $tripObj->setHeureArrivee($trip['heure_arrivee']);
      $tripObj->setStatut($trip['statut']);
      $tripObj->setNbPlace($trip['nb_place']);
      $tripObj->setPrice($trip['prix']);
      $tripObj->setUtilisateurId($trip['utilisateur_id']);
      $tripObj->setCarId($trip['voiture_id']);
      $tripObj->setPseudo($trip['pseudo']);
      $tripObj->setPhoto($trip['photo']);
      $tripObj->setNote($trip['note']);
      $tripObj->setModele($trip['modele']);
      $tripObj->setEnergie($trip['energie']);
      $tripObjects[] = $tripObj;
    }

    return $tripObjects;
  }
}
