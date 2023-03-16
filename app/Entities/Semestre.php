<!-- id	nom	credits	description	formation-->
<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Semestre extends Entity
{
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getNom() : string
    {
        return $this->attributes["nom"];
    }
    public function getCredits() : string
    {
        return $this->attributes["credits"];
    }
    public function getDescription() : string
    {
        return $this->attributes["description"];
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