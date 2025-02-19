<?php

namespace App\Controller;

use Exception;

class ContactController extends Controller
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
      'title' => 'Contact',
      'content' => 'Bienvenue sur la page de contact'
    ];
    $this->render('contact/contact', $params);
  }
}
