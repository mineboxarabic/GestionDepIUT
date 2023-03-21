<?php 
namespace App\Entities;

class Intervenant extends Utilisateur
{

    public function getNumProf() : string
    {
        return $this->attributes["numProf"];
    }

    public function getStatut() : string
    {
        return $this->attributes["statut"];
    }

    public function getDepIUT() : string
    {
        return $this->attributes["depIUT"];
    }


    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }

}


?>