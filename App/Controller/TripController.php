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
          case 'search_results':
            $this->search_results();
            break;
          case 'accept':
            $this->accept();
            break;
          case 'detail':
            $this->detail();
            break;
          case 'showReviews':
            $this->showReviews();
            break;
          case 'participate':
            $this->participate();
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

  public function detail()
  {
    $tripId = $_GET['id'] ?? null;

    if ($tripId === null) {
      // Rediriger ou afficher une erreur si l'ID du covoiturage n'est pas fourni
      header('Location: /index.php?controller=trip&action=list');
      exit;
    }

    $tripRepository = new TripRepository();
    $trip = $tripRepository->findById($tripId);

    if ($trip === null) {
      // Rediriger ou afficher une erreur si le covoiturage n'est pas trouvé
      header('Location: /index.php?controller=trip&action=list');
      exit;
    }

    $this->render('trip/detail', ['trip' => $trip]);
  }

  public function search()
  {
    try {
      $errors = [];
      $departure = $_GET['departure'] ?? null;
      $destination = $_GET['destination'] ?? null;
      $date = $_GET['date'] ?? null;
      $ecologique = $_GET['ecologique'] ?? null;
      $prix_max = $_GET['prix_max'] ?? null;
      $duree_max = $_GET['duree_max'] ?? null;
      $note_min = $_GET['note_min'] ?? null;

      if (empty($departure) || empty($destination) || empty($date)) {
        $errors[] = 'Tous les champs sont obligatoires.';
        $this->render('home/home', ['errors' => $errors]);
        return;
      }

      $tripRepository = new TripRepository();
      $trips = $tripRepository->findByRouteAndDate($departure, $destination, $date, $ecologique, $prix_max, $duree_max, $note_min);

      $this->render('trip/search_results', [
        'trips' => $trips,
        'departure' => $departure,
        'destination' => $destination,
        'date' => $date,
        'ecologique' => $ecologique,
        'prix_max' => $prix_max,
        'duree_max' => $duree_max,
        'note_min' => $note_min
      ]);
    } catch (Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  public function search_results()
  {
    $tripRepository = new TripRepository();
    $trips = $tripRepository->findAll();

    $this->render('trip/search_results', [
      'trips' => $trips
    ]);
  }

  public function accept()
  {
    try {
      $tripId = $_GET['trip_id'] ?? null;
      $userId = $_SESSION['user_id'] ?? null;

      if (!$tripId || !$userId) {
        throw new Exception('Paramètres manquants.');
      }

      $tripRepository = new TripRepository();
      $trip = $tripRepository->findById($tripId);

      if (!$trip) {
        throw new Exception('Covoiturage non trouvé.');
      }

      // Vérifiez si l'utilisateur a déjà accepté ce covoiturage
      if ($tripRepository->hasUserAcceptedTrip($userId, $tripId)) {
        throw new Exception('Vous avez déjà accepté ce covoiturage.');
      }

      // Accepter le covoiturage
      $tripRepository->acceptTrip($userId, $tripId);

      // Rediriger vers la page des résultats de recherche avec un message de succès
      $_SESSION['success_message'] = 'Covoiturage accepté avec succès.';
      header('Location: /index.php?controller=trip&action=search');
      exit;
    } catch (Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  public function showReviews()
  {
    $userId = $_GET['id'] ?? null;

    if ($userId === null) {
      // Rediriger ou afficher une erreur si l'ID de l'utilisateur n'est pas fourni
      header('Location: /index.php?controller=trip&action=list');
      exit;
    }

    $tripRepository = new TripRepository();
    $reviews = $tripRepository->findReviewsByUserId($userId);

    $this->render('trip/reviews', ['reviews' => $reviews]);
  }

  public function participate()
  {
    session_start();
    $tripId = $_GET['id'] ?? null;

    if ($tripId === null) {
      // Rediriger ou afficher une erreur si l'ID du covoiturage n'est pas fourni
      header('Location: /index.php?controller=trip&action=list');
      exit;
    }

    if (!isset($_SESSION['user_id'])) {
      // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
      $_SESSION['redirect_after_login'] = "/index.php?controller=trip&action=participate&id=$tripId";
      header('Location: /index.php?controller=user&action=login');
      exit;
    }

    $userId = $_SESSION['user_id'];
    $tripRepository = new TripRepository();

    // Vérifier si l'utilisateur a déjà accepté le covoiturage
    if ($tripRepository->hasUserAcceptedTrip($userId, $tripId)) {
      // Rediriger ou afficher un message si l'utilisateur a déjà accepté
      header('Location: /index.php?controller=trip&action=detail&id=' . $tripId);
      exit;
    }

    // Ajouter la participation de l'utilisateur au covoiturage
    $tripRepository->acceptTrip($userId, $tripId);

    // Rediriger vers la page de détails du covoiturage
    header('Location: /index.php?controller=trip&action=detail&id=' . $tripId);
    exit;
  }
}
