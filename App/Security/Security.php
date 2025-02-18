<?php

namespace App\Security;

use App\Entity\Users;
use App\Tools\NavigationTools;
use App\Tools\StringTools;
use PDO;
use App\Entity\Entity;

class Security
{
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
}
