<?php 
namespace App\Entities;

use CodeIgniter\Entity\Entity;

use CodeIgniter\I18n\Time;

class DepIUT extends Entity {


	public function getId() : string
	{
		return $this->attributes["id"];
	}
	
	public function getNom() : string
	{
		return $this->attributes["nom"];
	}
	
	public function getVille() : string
	{
		return $this->attributes["ville"];
	}
	
	public function getAdresse() : string
	{
		return $this->attributes["adresse"];
	}
	
	public function getDescription() :string
	{
		return $this->attributes["description"];
	}
	
	public function getDeleted()
	{
		return $this->attributes["deleted"];
	}
}
    