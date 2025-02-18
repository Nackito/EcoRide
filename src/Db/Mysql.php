<?php

namespace App\Db;

use PDO;
use PDOException;

class Mysql
{
  private static $instance = null;
  private $pdo;

  private function __construct()
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
      die("Database connection failed: " . $e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getPDO()
  {
    return $this->pdo;
  }
}
