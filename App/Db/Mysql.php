<?php

namespace App\Db;

use PDO;

class Mysql
{
  private $db_name;
  private $db_user;
  private $db_password;
  private $db_host;
  private $db_port;
  private $pdo = null;
  private static $_instance = null;

  private function __construct()
  {
    $conf = require_once _ROOTPATH_ . '/db_config.php';

    if (isset($conf['db']['db_name'])) {
      $this->db_name = $conf['db']['db_name'];
    }
    if (isset($conf['db']['db_user'])) {
      $this->db_user = $conf['db']['db_user'];
    }
    if (isset($conf['db']['db_password'])) {
      $this->db_password = $conf['db']['db_password'];
    }
    if (isset($conf['db']['db_host'])) {
      $this->db_host = $conf['db']['db_host'];
    }
    if (isset($conf['db']['db_port'])) {
      $this->db_port = $conf['db']['db_port'];
    }
  }

  // Son rôle est soit de nous donner une instance ou de créer une instance s'il n'y en a pas
  public static function getInstance(): self
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new Mysql();
    }
    return self::$_instance;
  }

  public function getPDO(): PDO
  {
    if (is_null($this->pdo)) {
      $dsn = 'mysql:host=' . $this->db_host . ';port=' . $this->db_port . ';dbname=' . $this->db_name;
      $this->pdo = new PDO($dsn, $this->db_user, $this->db_password);
    }
    return $this->pdo;
  }
}
