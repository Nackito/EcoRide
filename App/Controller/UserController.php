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
          case 'edit':
            //$this->edit();
            break;
          case 'delete':
            //$this->delete();
            break;
          default:
            throw new Exception("Cette action n'existe pas ok : " . $_GET['action']);
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
      $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

      // Validation des données
      if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8) {
        $user = new Users();
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);

        $userRepository = new UserRepository();
        $userRepository->save($user);

        echo "Compte créé avec succès !";
      } else {
        $errors[] = "Email invalide ou mot de passe trop court.";
      }
    }
    $this->render('auth/register', [
      'errors' => $errors,
    ]);
  }
}
