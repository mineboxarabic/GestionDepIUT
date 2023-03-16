<!-- 	id	debut	fin	intervenant	module	-->
<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Assurer extends Entity
{
    
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getDebut() : string
    {
        return $this->attributes["debut"];
    }
    public function getFin() : string
    {
        return $this->attributes["fin"];
    }
    public function getIntervenant() : string
    {
        return $this->attributes["intervenant"];
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