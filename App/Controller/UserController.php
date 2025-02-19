<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UserRepository;
use Exception;

class UserController extends Controller
{

  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'register':
            $this->register();
            break;
          case 'profile':
            $this->profile();
            break;
          case 'edit':
            $this->edit();
            break;
          case 'delete':
            //$this->delete();
            break;
          case 'logout':
            $this->logout();
            break;
          case 'login':
            $this->login();
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

  public function register()
  {
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $pseudo = $_POST['pseudo'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Validation des données
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide.";
      }

      if (!$this->isPasswordSecure($password)) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
      }

      if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new Users();
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);

        $userRepository = new UserRepository();
        $userRepository->save($user);

        echo "Compte créé avec succès !";
      }
    }
    $this->render('auth/register', [
      'errors' => $errors,
    ]);
  }

  public function profile()
  {
    if (!isset($_SESSION['user']['id'])) {
      // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
      header('Location: index.php?controller=user&action=login');
      exit();
    }

    $userRepository = new UserRepository();
    $user = $userRepository->findById($_SESSION['user']['id']);

    if (!$user) {
      // Rediriger vers la page de connexion si l'utilisateur n'est pas trouvé
      header('Location: index.php?controller=user&action=login');
      exit();
    }

    $this->render('user/profile', [
      'user' => $user,
    ]);
  }

  public function edit()
  {
    $errors = [];
    $userRepository = new UserRepository();

    if (!isset($_SESSION['user']['id'])) {
      // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
      header('Location: index.php?controller=user&action=login');
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $pseudo = $_POST['pseudo'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $roles = $_POST['roles'];

      // Validation des données
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide.";
      }

      if (!$this->isPasswordSecure($password)) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
      }

      if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new Users();
        $user->setId($_SESSION['user']['id']); // Assurez-vous que l'ID de l'utilisateur est défini
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);
        $user->setRoles($roles);

        // Enregistrer les informations supplémentaires pour les chauffeurs
        if (in_array('chauffeur', $roles)) {
          $user->setImmatriculation($_POST['immatriculation']);
          $user->setDatePremiereImmatriculation($_POST['date_premiere_immatriculation']);
          $user->setModele($_POST['modele']);
          $user->setCouleur($_POST['couleur']);
          $user->setMarque($_POST['marque']);
          $user->setNbPlace($_POST['nb_place']);
          $user->setPreferences($_POST['preferences']);
        }

        $userRepository->update($user);

        echo "Informations mises à jour avec succès !";
      }
    } else {
      // Récupérer les informations de l'utilisateur connecté
      $user = $userRepository->findById($_SESSION['user']['id']);
      if (!$user) {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas trouvé
        header('Location: index.php?controller=user&action=login');
        exit();
      }
    }

    $this->render('user/edit', [
      'user' => $user,
      'errors' => $errors,
    ]);
  }

  private function isPasswordSecure($password)
  {
    return strlen($password) >= 8 &&
      preg_match('/[A-Z]/', $password) &&
      preg_match('/[a-z]/', $password) &&
      preg_match('/[0-9]/', $password) &&
      preg_match('/[\W]/', $password);
  }

  protected function logout()
  {
    //Prévient les attaques de fixation de session
    session_regenerate_id(true);
    //Supprime les données de session du serveur
    session_destroy();
    //Supprime les données du tableau $_SESSION
    unset($_SESSION);
    header('location: index.php?controller=user&action=login');
    //exit();
  }

  public function login()
  {
    $errors = [];
    if (session_status() == PHP_SESSION_NONE) {
      session_start(); // Démarrer la session si elle n'est pas déjà active
    }
    /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];*/
    if (isset(($_POST['loginUser']))) {

      $userRepository = new UserRepository();
      $user = $userRepository->findOneByEmail($_POST['email']);

      //if ($user && password_verify($password, $user->getPassword())) {
      if ($user && $user->verifyPassword($_POST['password'])) {
        // Stocker l'ID de l'utilisateur dans la session
        //$_SESSION['utilisateur_id'] = $user->getId();
        $_SESSION['user'] = [
          'id' => $user->getId(),
          'lastname' => $user->getLastname(),
          'firstname' => $user->getFirstName(),
          'email' => $user->getEmail(),
          'role' => $user->getRole(),
        ];
        header('Location: index.php?controller=user&action=profile');
        exit();
      } else {
        $errors[] = "Email ou mot de passe incorrect.";
      }
    }

    $this->render('auth/login', [
      'errors' => $errors,
    ]);
  }
}
