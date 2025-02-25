<?php

namespace App\Controller;

use Exception;

class Controller
{
  public function route(): void
  {
    try {

      if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
          case 'home':
            $Controller = new HomeController();
            $Controller->route();
          case 'contact':
            $Controller = new ContactController();
            $Controller->route();
            break;
          case 'about':
            $this->render('about');
            break;
          case 'user':
            $Controller = new UserController();
            $Controller->route();
            break;
          case 'trip':
            $Controller = new TripController();
            $Controller->route();
            break;
          default:
            $this->render('errors/404');
            break;
        }
      } else {
        $Controller = new HomeController();
        $Controller->route();
        //$this->render('home/home');
      }
    } catch (Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  protected function render(string $path, array $params = []): void
  {

    $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';

    try {
      if (!file_exists($filePath)) {
        throw new Exception("Fichier non trouvé : " . $filePath);
      } else {
        extract($params);
        require_once $filePath;
      }
    } catch (Exception $e) {
      // Libération des données

      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }
}
