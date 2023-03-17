<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Seance extends Entity
{
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getDate() : string
    {
        return $this->attributes["date"];
    }
    public function getHeure() : string
    {
        return $this->attributes["heure"];
    }
    public function getDuree() : string
    {
        return $this->attributes["duree"];
    }
    public function getTitre() : string
    {
        return $this->attributes["titre"];
    }
    public function getSalle() : string
    {
        return $this->attributes["salle"];
    }
    public function getDescription() : string
    {
        return $this->attributes["description"];
    }
    public function getType() : string
    {
        return $this->attributes["type"];
    }
    public function getModule() : string
    {
        return $this->attributes["module"];
    }
    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }
}


?>