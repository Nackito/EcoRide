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
          case 'delete':
            //$this->delete();
            break;
          case 'edit':
            $this->edit();
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
    // Récupérer les informations de l'utilisateur connecté
    // Pour l'exemple, nous allons utiliser un utilisateur fictif
    $user = new Users();
    $user->setPseudo('JohnDoe');
    $user->setEmail('john.doe@example.com');
    $user->setCredits(20);

    $this->render('user/profile', [
      'user' => $user,
    ]);
  }

  public function edit()
  {
    $errors = [];
    $userRepository = new UserRepository();

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

        $userRepository->update($user);

        echo "Informations mises à jour avec succès !";
      }
    } else {
      // Récupérer les informations de l'utilisateur connecté
      // Pour l'exemple, nous allons utiliser un utilisateur fictif
      $user = new Users();
      $user->setPseudo('JohnDoe');
      $user->setEmail('john.doe@example.com');
      $user->setCredits(20);
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
}
