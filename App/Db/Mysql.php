<?php

namespace App\Db;

use PDO;
use PDOException;

class Mysql
{
  private $pdo;

  public function __construct()
  {
    $config = require __DIR__ . '/../../db_config.php';
    $dbConfig = $config['db'];

    try {
      $this->pdo = new PDO(
        "mysql:host={$dbConfig['db_host']};dbname={$dbConfig['db_name']};port={$dbConfig['db_port']}",
        $dbConfig['db_user'],
        $dbConfig['db_password']
      );
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      throw new PDOException("Erreur de connexion à la base de données : " . $e->getMessage());
    }
  }

  public function getPDO()
  {
    return $this->pdo;
  }
}
