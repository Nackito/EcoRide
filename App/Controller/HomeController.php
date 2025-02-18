<?php

namespace App\Controller;

use Exception;
use App\Controller\Controller;

class HomeController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'show':
            $this->show();
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

  public function show(): void
  {
    $params = [
      'title' => 'Accueil',
      'content' => 'Bienvenue sur la page d\'accueil'
    ];
    $this->render('home/show', $params);
  }
}
