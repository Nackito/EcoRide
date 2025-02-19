<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Repository\TripRepository;
use App\Repository\CarRepository;
use Exception;

class TripController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'create':
            $this->create();
            break;
          default:
            throw new Exception("Cette action n'existe pas : " . $_GET['action']);
        }
      } else {
        throw new Exception("Aucune action détectée");
      }
    } catch (Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  public function create()
  {
    $errors = [];
    $carRepository = new CarRepository();
    $cars = $carRepository->findCarsByUserId($_SESSION['user']['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $dateDepart = $_POST['date_depart'];
      $heureDepart = $_POST['heure_depart'];
      $dateArrivee = $_POST['date_arrivee'];
      $heureArrivee = $_POST['heure_arrivee'];
      $statut = $_POST['statut'];
      $nbPlace = $_POST['nb_place'];
      $carId = $_POST['car'];

      // Validation des données
      if (empty($dateDepart) || empty($heureDepart) || empty($dateArrivee) || empty($heureArrivee) || empty($statut) || empty($nbPlace) || empty($carId)) {
        $errors[] = "Tous les champs sont obligatoires.";
      }

      if (empty($errors)) {
        $trip = new Trip();
        $trip->setDateDepart($dateDepart);
        $trip->setHeureDepart($heureDepart);
        $trip->setDateArrivee($dateArrivee);
        $trip->setHeureArrivee($heureArrivee);
        $trip->setStatut($statut);
        $trip->setNbPlace($nbPlace);
        $trip->setUtilisateurId($_SESSION['user']['id']); // Assurez-vous que l'utilisateur est connecté
        $trip->setCarId($carId);

        $tripRepository = new TripRepository();
        $tripRepository->save($trip);

        echo "Voyage créé avec succès !";
      }
    }
    $this->render('trip/create_trip', [
      'errors' => $errors,
      'cars' => $cars
    ]);
  }
}
