<?php

namespace App\Repository;

use App\Db\Mysql;
use App\Entity\Users;

class Repository
{
  protected \PDO $pdo;

  public function __construct()
  {
    //Appel bdd
    $mysql = Mysql::getInstance();
    $this->pdo = $mysql->getPDO();
  }
}
