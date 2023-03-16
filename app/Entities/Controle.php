<!-- id	type	duree	sujet	bareme	description	seance	->
<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Seance extends Entity
{
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getType() : string
    {
        return $this->attributes["type"];
    }
    public function getDuree() : string
    {
        return $this->attributes["duree"];
    }
    public function getSujet() : string
    {
        return $this->attributes["sujet"];
    }
    public function getBareme() : string
    {
        return $this->attributes["bareme"];
    }
    public function getDescription() : string
    {
        return $this->attributes["description"];
    }
    public function getSeance() : string
    {
        return $this->attributes["seance"];
    }
    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }
}


?>