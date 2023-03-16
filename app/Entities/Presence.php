<!-- id	justifie	commentaires	seance	etudiant-->
<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Presence extends Entity
{
    public function getId() : string
    {
        return $this->attributes["id"];
    }
    public function getJustifie() : string
    {
        return $this->attributes["justifie"];
    }
    public function getCommentaires() : string
    {
        return $this->attributes["commentaires"];
    }
    public function getSeance() : string
    {
        return $this->attributes["seance"];
    }
    public function getEtudiant() : string
    {
        return $this->attributes["etudiant"];
    }
    public function getDeleted() 
    {
        return $this->attributes["deleted"];
    }
    
}


?>