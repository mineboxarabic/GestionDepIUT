<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Etudiant extends Entity
{
    public function getDni() : string
    {
        return $this->attributes["dni"];
    }

    public function getNom() : string
    {
        return $this->attributes["nom"];
    }

    public function getNumEtu() : string
    {
        return $this->attributes["numEtu"];
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

    public function getFormation() : string
    {
        return $this->attributes["formation"];
    }

    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }

}


?>