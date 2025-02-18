<?php

namespace App\Entity;

class Users extends Entity
{
  protected ?int $id = null;
  protected ?string $lastname = '';
  protected ?string $firstname = '';
  protected ?string $email = '';
  protected ?string $password = '';
  protected ?int $phone = null;
  protected ?string $adress = '';
  protected ?string $date = '';
  protected ?string $photo = '';
  protected ?string $role = '';
  protected ?int $credits = 20; // Ajout de la propriété credits
  protected ?string $pseudo = ''; // Ajout de la propriété pseudo

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of lastname
   */
  public function getLastname()
  {
    return $this->lastname;
  }

  /**
   * Set the value of lastname
   *
   * @return  self
   */
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;

    return $this;
  }

  /**
   * Get the value of firstname
   */
  public function getFirstname()
  {
    return $this->firstname;
  }

  /**
   * Set the value of firstname
   *
   * @return  self
   */
  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
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

  /**
   * Get the value of phone
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get the value of adress
   */
  public function getAdress()
  {
    return $this->adress;
  }

  /**
   * Set the value of adress
   *
   * @return  self
   */
  public function setAdress($adress)
  {
    $this->adress = $adress;

    return $this;
  }

  /**
   * Get the value of date
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * Set the value of date
   *
   * @return  self
   */
  public function setDate($date)
  {
    $this->date = $date;

    return $this;
  }

  /**
   * Get the value of photo
   */
  public function getPhoto()
  {
    return $this->photo;
  }

  /**
   * Set the value of photo
   *
   * @return  self
   */
  public function setPhoto($photo)
  {
    $this->photo = $photo;

    return $this;
  }

  /**
   * Get the value of role
   */
  public function getRole()
  {
    return $this->role;
  }

  /**
   * Set the value of role
   *
   * @return  self
   */
  public function setRole($role)
  {
    $this->role = $role;

    return $this;
  }

  /**
   * Get the value of credits
   */
  public function getCredits()
  {
    return $this->credits;
  }

  /**
   * Set the value of credits
   *
   * @return  self
   */
  public function setCredits($credits)
  {
    $this->credits = $credits;

    return $this;
  }

  /**
   * Get the value of pseudo
   */
  public function getPseudo()
  {
    return $this->pseudo;
  }

  /**
   * Set the value of pseudo
   *
   * @return  self
   */
  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;

    return $this;
  }

  public static function isLogged(): bool
  {
    return isset($_SESSION['user']);
  }
}
