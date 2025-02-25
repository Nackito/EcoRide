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
  protected ?float $price = 0.0;
  protected ?int $utilisateurId = null;
  protected ?int $carId = null;
  protected ?string $pseudo = ''; // Ajout du pseudo de l'utilisateur
  protected ?string $modele = ''; // Ajout du modèle de la voiture
  protected ?string $departure = ''; // Ajout du point de départ
  protected ?string $destination = ''; // Ajout de la destination
  protected ?string $energie = ''; // Ajout de l'énergie de la voiture
  protected ?int $note = 0; // Ajout de la note de l'utilisateur
  protected ?string $photo = ''; // Ajout de la photo de l'utilisateur
  protected ?string $duree = ''; // Ajout de la durée du trajet

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

  /**
   * Get the value of price
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */
  public function setPrice($price)
  {
    $this->price = $price;

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

  /**
   * Get the value of modele
   */
  public function getModele()
  {
    return $this->modele;
  }

  /**
   * Set the value of modele
   *
   * @return  self
   */
  public function setModele($modele)
  {
    $this->modele = $modele;

    return $this;
  }

  /**
   * Get the value of departure
   */
  public function getDeparture()
  {
    return $this->departure;
  }

  /**
   * Set the value of departure
   *
   * @return  self
   */
  public function setDeparture($departure)
  {
    $this->departure = $departure;

    return $this;
  }

  /**
   * Get the value of destination
   */
  public function getDestination()
  {
    return $this->destination;
  }

  /**
   * Set the value of destination
   *
   * @return  self
   */
  public function setDestination($destination)
  {
    $this->destination = $destination;

    return $this;
  }

  /**
   * Get the value of energie
   */
  public function getEnergie()
  {
    return $this->energie;
  }

  /**
   * Set the value of energie
   *
   * @return  self
   */
  public function setEnergie($energie)
  {
    $this->energie = $energie;

    return $this;
  }

  /**
   * Get the value of note
   */
  public function getNote()
  {
    return $this->note;
  }

  /**
   * Set the value of note
   *
   * @return  self
   */
  public function setNote($note)
  {
    $this->note = $note;

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
   * Get the value of duree
   */
  public function getDuree()
  {
    return $this->duree;
  }

  /**
   * Set the value of duree
   *
   * @return  self
   */
  public function setDuree($duree)
  {
    $this->duree = $duree;

    return $this;
  }
}
