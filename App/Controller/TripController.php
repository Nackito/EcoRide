<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Repository\TripRepository;
use App\Repository\CarRepository;
use App\Repository\UserRepository;
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
          case 'history':
            $this->history();
            break;
          case 'cancel':
            $this->cancel();
            break;
          case 'list':
            $this->list();
            break;
          case 'search':
            $this->search();
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

  private function ensureUserIsLoggedIn()
  {
    if (!isset($_SESSION['user']['id'])) {
      throw new Exception("Vous devez être connecté pour effectuer cette action.");
    }
  }

  public function cancel()
  {
    $this->ensureUserIsLoggedIn();

    if (!isset($_GET['trip_id'])) {
      throw new Exception("Aucun covoiturage spécifié.");
    }

    $tripId = $_GET['trip_id'];
    $tripRepository = new TripRepository();
    $trip = $tripRepository->findById($tripId);

    if (!$trip) {
      throw new Exception("Covoiturage non trouvé.");
    }

    // Vérifier si l'utilisateur est le chauffeur ou un participant
    if ($trip->getUtilisateurId() !== $_SESSION['user']['id']) {
      throw new Exception("Vous n'avez pas la permission d'annuler ce covoiturage.");
    }

    // Annuler le covoiturage
    $tripRepository->cancel($tripId);

    // Mettre à jour les crédits et les places disponibles
    $userRepository = new UserRepository();
    $user = $userRepository->findById($_SESSION['user']['id']);
    $user->setCredits($user->getCredits() + 2);
    $userRepository->update($user);

    // Envoyer un email aux participants si le chauffeur annule
    if ($trip->getUtilisateurId() === $_SESSION['user']['id']) {
      $participants = $tripRepository->findParticipantsByTripId($tripId);
      foreach ($participants as $participant) {
        mail($participant->getEmail(), "Annulation de covoiturage", "Le covoiturage auquel vous participez a été annulé.");
      }
    }

    echo "Covoiturage annulé avec succès.";
  }

  public function history()
  {
    $this->ensureUserIsLoggedIn();

    $tripRepository = new TripRepository();
    $trips = $tripRepository->findByUserId($_SESSION['user']['id']);

    $this->render('trip/history', [
      'trips' => $trips
    ]);
  }

  public function create()
  {
    $this->ensureUserIsLoggedIn();

    $errors = [];
    $carRepository = new CarRepository();
    $cars = $carRepository->findCarsByUserId($_SESSION['user']['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $departure = $_POST['departure'];
      $dateDepart = $_POST['date_depart'];
      $heureDepart = $_POST['heure_depart'];
      $destination = $_POST['destination'];
      $dateArrivee = $_POST['date_arrivee'];
      $heureArrivee = $_POST['heure_arrivee'];
      $statut = $_POST['statut'];
      $nbPlace = $_POST['nb_place'];
      $price = $_POST['price'];
      $carId = $_POST['car'];

      // Validation des données
      if (empty($departure) || empty($dateDepart) || empty($heureDepart) || empty($destination) || empty($dateArrivee) || empty($heureArrivee) || empty($statut) || empty($nbPlace) || empty($price) || empty($carId)) {
        $errors[] = "Tous les champs sont obligatoires.";
      }

      if (empty($errors)) {
        $trip = new Trip();
        $trip->setDeparture($departure);
        $trip->setDateDepart($dateDepart);
        $trip->setHeureDepart($heureDepart);
        $trip->setDestination($destination);
        $trip->setDateArrivee($dateArrivee);
        $trip->setHeureArrivee($heureArrivee);
        $trip->setStatut($statut);
        $trip->setNbPlace($nbPlace);
        $trip->setPrice($price);
        $trip->setUtilisateurId($_SESSION['user']['id']); // Assurez-vous que l'utilisateur est connecté
        $trip->setCarId($carId);

        $tripRepository = new TripRepository();
        $tripRepository->save($trip);

        // Déduire 2 crédits pour la plateforme
        $userRepository = new UserRepository();
        $user = $userRepository->findById($_SESSION['user']['id']);
        $user->setCredits($user->getCredits() - 2);
        $userRepository->update($user);

        echo "Voyage créé avec succès !";
      }
    }
    $this->render('trip/create_trip', [
      'errors' => $errors,
      'cars' => $cars
    ]);
  }

  public function list()
  {
    $tripRepository = new TripRepository();
    $trips = $tripRepository->findAll();

    $this->render('trip/trip', [
      'trips' => $trips
    ]);
  }

  public function search()
  {
    try {
      $departure = $_GET['departure'] ?? null;
      $destination = $_GET['destination'] ?? null;
      $date = $_GET['date'] ?? null;

      $tripRepository = new TripRepository();
      $trips = $tripRepository->findByRouteAndDate($departure, $destination, $date);

      $this->render('trip/search_results', [
        'trips' => $trips,
        'departure' => $departure,
        'destination' => $destination,
        'date' => $date
      ]);
    } catch (Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }
}
