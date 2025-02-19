<?php

namespace App\Repository;

use App\Entity\Users;
use App\Db\Mysql;
use PDO;

class UserRepository extends Repository
{

  public function findById($id)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE utilisateur_id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
      $user = new Users();
      $user->setId($data['utilisateur_id']);
      $user->setLastname($data['nom']);
      $user->setFirstname($data['prenom']);
      $user->setEmail($data['email']);
      $user->setPassword($data['password']);
      $user->setPhone($data['telephone']);
      $user->setAdress($data['adresse']);
      $user->setDate($data['date_naissance']);
      $user->setPhoto($data['photo']);
      $user->setPseudo($data['pseudo']);
      $user->setCredits($data['credits']);
      // Récupérer les rôles de l'utilisateur
      $user->setRoles($this->findRolesByUserId($data['utilisateur_id']));
      return $user;
    }

    return null;
  }

  private function findRolesByUserId($userId)
  {
    $stmt = $this->pdo->prepare("SELECT r.libelle FROM Role r JOIN roleUtilisateur ru ON r.role_id = ru.role_id WHERE ru.utilisateur_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }
  public function save(Users $user)
  {
    $stmt = $this->pdo->prepare("INSERT INTO Utilisateur (nom, prenom, email, password, telephone, adresse, photo, pseudo, credits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
      $user->getLastname(),
      $user->getFirstname(),
      $user->getEmail(),
      $user->getPassword(),
      $user->getPhone(),
      $user->getAdress(),
      $user->getPhoto(),
      $user->getPseudo(),
      $user->getCredits()
    ]);

    $userId = $this->pdo->lastInsertId();
    $this->saveRoles($userId, $user->getRoles());
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

    $this->saveRoles($user->getId(), $user->getRoles());
  }

  private function saveRoles($userId, $roles)
  {
    // Supprimer les rôles existants
    $stmt = $this->pdo->prepare("DELETE FROM roleUtilisateur WHERE utilisateur_id = ?");
    $stmt->execute([$userId]);

    // Ajouter les nouveaux rôles
    foreach ($roles as $role) {
      // Vérifier si le rôle existe dans la table Role
      $stmt = $this->pdo->prepare("SELECT role_id FROM Role WHERE libelle = ?");
      $stmt->execute([$role]);
      $roleId = $stmt->fetchColumn();

      // Si le rôle n'existe pas, l'insérer
      if (!$roleId) {
        $stmt = $this->pdo->prepare("INSERT INTO Role (libelle) VALUES (?)");
        $stmt->execute([$role]);
        $roleId = $this->pdo->lastInsertId();
      }

      // Insérer le rôle dans la table roleUtilisateur
      $stmt = $this->pdo->prepare("INSERT INTO roleUtilisateur (utilisateur_id, role_id) VALUES (?, ?)");
      $stmt->execute([$userId, $roleId]);
    }
  }

  public function findOneByEmail($email)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
      $user = new Users();
      $user->setId($data['utilisateur_id']);
      $user->setLastname($data['nom']);
      $user->setFirstname($data['prenom']);
      $user->setEmail($data['email']);
      $user->setPassword($data['password']);
      $user->setPhone($data['telephone']);
      $user->setAdress($data['adresse']);
      $user->setDate($data['date_naissance']);
      $user->setPhoto($data['photo']);
      $user->setPseudo($data['pseudo']);
      $user->setCredits($data['credits']);
      // Récupérer les rôles de l'utilisateur
      $user->setRoles($this->findRolesByUserId($data['utilisateur_id']));
      return $user;
    }

    return null;
  }
}
