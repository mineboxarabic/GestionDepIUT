<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Etudiant extends Utilisateur
{
    public function getNumEtu() : string
    {
        return $this->attributes["numEtu"];
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