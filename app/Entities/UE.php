<!-- id	code	credits	volume	description	semestre-->
<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UE extends Entity
{
    
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getCode() : string
    {
        return $this->attributes["code"];
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
    public function getSemestre() : string
    {
        return $this->attributes["semestre"];
    }
    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }

}


?>