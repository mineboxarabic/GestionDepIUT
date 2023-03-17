<?php
namespace App\Entities;

use CodeIgniter\Entity;

class Utilisateur extends Entity
{
    // dni nom prenom adresse naissance utilisateur motDePasse role
    public function getDni() : string
    {
        return $this->attributes["dni"];
    }
    public function getNom() : string
    {
        return $this->attributes["nom"];
    }
    public function getPrenom() : string
    {
        return $this->attributes["prenom"];
    }
    public function getAdresse() : string
    {
        return $this->attributes["adresse"];
    }
    public function getNaissance() : string
    {
        return $this->attributes["naissance"];
    }
    public function getUtilisateur() : string
    {
        return $this->attributes["utilisateur"];
    }
    public function getMotDePasse() : string
    {
        return $this->attributes["motDePasse"];
    }
    public function getRole() : string
    {
        return $this->attributes["role"];
    }
    

}

?>