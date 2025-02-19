<?php

namespace App\Security;

use App\Entity\Users;
use App\Tools\NavigationTools;
use App\Tools\StringTools;
use PDO;
use App\Entity\Entity;

class Security
{
  protected $password = '';
  public static function hash(string $password): string
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public static function verify(string $password, string $hash): bool
  {
    return password_verify($password, $hash);
  }

  public static function isUser(): bool
  {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === "2";
  }

  public static function isEmployed(): bool
  {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === "3";
  }

  public static function isAdmin(): bool
  {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === "1";
  }

  public function verifyPassword(string $password): bool
  {
    if (password_verify($password, $this->password)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }
}
