<!-- id	code	nom	credits	volume	description	ue	-->
<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Module extends Entity
{
    
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getCode() : string
    {
        return $this->attributes["code"];
    }
    public function getNom() : string
    {
        return $this->attributes["nom"];
    }
    public function getCredits() : string
    {
        return $this->attributes["credits"];
    }
    public function getVolume() : string
    {
        return $this->attributes["volume"];
    }
    public function getDescription() : string
    {
        return $this->attributes["description"];
    }
    public function getUe() : string
    {
        return $this->attributes["ue"];
    }
    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }
    
}


?>