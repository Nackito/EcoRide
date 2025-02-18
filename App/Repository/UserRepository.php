<?php

namespace App\Repository;

use App\Entity\Users;
use App\Db\Mysql;

class UserRepository extends Repository
{

  public function save(Users $user)
  {
    $stmt = $this->pdo->prepare("INSERT INTO Utilisateur (nom, prenom, email, password, telephone, adresse, date_naissance, photo, pseudo, credits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
      $user->getLastname(),
      $user->getFirstname(),
      $user->getEmail(),
      $user->getPassword(),
      $user->getPhone(),
      $user->getAdress(),
      $user->getDate(),
      $user->getPhoto(),
      $user->getPseudo(),
      $user->getCredits()
    ]);
  }

  public function update(Users $user)
  {
    $stmt = $this->pdo->prepare("UPDATE Utilisateur SET email = ?, password = ?, pseudo = ? WHERE utilisateur_id = ?");
    $stmt->execute([
      $user->getEmail(),
      $user->getPassword(),
      $user->getPseudo(),
      $user->getId()
    ]);
  }
}
