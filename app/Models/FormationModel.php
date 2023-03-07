<?php
namespace App\Models;
use CodeIgniter\Model;

class FormationModel extends Model
{
// La configuration de base de données à utiliser.
     protected $DBGroup = 'default';
     

    protected $table      = 'Formation';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $returnType     = \App\Entities\Formation::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nom','capacite', 'pn','description', 'depIUT'];     
     
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';
    
     
     protected function initialize()
    {
  
    }
    
 		/** 
		* Méthode utilisant la base de données pour retrouver l'identifiant le plus élevé.
		* La builder de paramètre est celle fournie par ce même modèle. 
		* Cela marche parce qu'il semble que l'instance du builder récupérée n'est pas partagée
		* parmi plusieurs appels de la fonction builder. 
		**/
		function obtenirMaxIdDB($builder) : int
		{
			try 
			{
				$posId = 0;
				//$connexion = \Config\Database::connect();
				//$builder = $connexion->table($table);
				//$builder = $this->builder();
				$query = $builder->select('id')
												 ->orderBy('created', 'DESC')
												 ->limit(1)
												 ->get();
												 
				$resultats = $query->getResult();
				if (count($resultats) > 0)
				{
			  		$dernierId = $resultats[0]->id;
						$posId = (int)substr($dernierId, 1);
						$posId++;
				}
				return $posId;
			}
			catch(\Exception $e)
			{
				return view('pageErreur', ['exception' => $e]);
			}		
		}

}
    