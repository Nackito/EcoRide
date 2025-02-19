<?php

namespace App\Entity;

class Trip extends Entity
{
  protected ?int $id = null;
  protected ?string $dateDepart = '';
  protected ?string $heureDepart = '';
  protected ?string $dateArrivee = '';
  protected ?string $heureArrivee = '';
  protected ?string $statut = '';
  protected ?int $nbPlace = 0;
  protected ?int $utilisateurId = null;
  protected ?int $carId = null;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function getDateDepart()
  {
    return $this->dateDepart;
  }

  public function setDateDepart($dateDepart)
  {
    $this->dateDepart = $dateDepart;
    return $this;
  }

  public function getHeureDepart()
  {
    return $this->heureDepart;
  }

  public function setHeureDepart($heureDepart)
  {
    $this->heureDepart = $heureDepart;
    return $this;
  }

  public function getDateArrivee()
  {
    return $this->dateArrivee;
  }

  public function setDateArrivee($dateArrivee)
  {
    $this->dateArrivee = $dateArrivee;
    return $this;
  }

  public function getHeureArrivee()
  {
    return $this->heureArrivee;
  }

  public function setHeureArrivee($heureArrivee)
  {
    $this->heureArrivee = $heureArrivee;
    return $this;
  }

  public function getStatut()
  {
    return $this->statut;
  }

  public function setStatut($statut)
  {
    $this->statut = $statut;
    return $this;
  }

  public function getNbPlace()
  {
    return $this->nbPlace;
  }

  public function setNbPlace($nbPlace)
  {
    $this->nbPlace = $nbPlace;
    return $this;
  }

  public function getUtilisateurId()
  {
    return $this->utilisateurId;
  }

  public function setUtilisateurId($utilisateurId)
  {
    $this->utilisateurId = $utilisateurId;
    return $this;
  }

  public function getCarId()
  {
    return $this->carId;
  }

  public function setCarId($carId)
  {
    $this->carId = $carId;
    return $this;
  }
}
