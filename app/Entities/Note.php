<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Note extends Entity
{
   //id	note	commentaires	controle	etudiant

    public function getId() : string
    {
        return $this->attributes["id"];
    }

    public function getNote() : string
    {
        return $this->attributes["note"];
    }

    public function getCommentaires() : string
    {
        return $this->attributes["commentaires"];
    }

    public function getControle() : string
    {
        return $this->attributes["controle"];
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