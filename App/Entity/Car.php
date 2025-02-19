<?php

namespace App\Entity;

class Car extends Entity
{
  protected ?int $id = null;
  protected ?string $marque = '';
  protected ?string $modele = '';
  protected ?string $couleur = '';
  protected ?string $immatriculation = '';
  protected ?int $utilisateurId = null;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function getMarque()
  {
    return $this->marque;
  }

  public function setMarque($marque)
  {
    $this->marque = $marque;
    return $this;
  }

  public function getModele()
  {
    return $this->modele;
  }

  public function setModele($modele)
  {
    $this->modele = $modele;
    return $this;
  }

  public function getCouleur()
  {
    return $this->couleur;
  }

  public function setCouleur($couleur)
  {
    $this->couleur = $couleur;
    return $this;
  }

  public function getImmatriculation()
  {
    return $this->immatriculation;
  }

  public function setImmatriculation($immatriculation)
  {
    $this->immatriculation = $immatriculation;
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
}
