<?php 
namespace App\Models;
use CodeIgniter\Model;

class IntervenantModel extends Model
{
    //dni	nom	prenom	adresse	naissance	numProf	statut	utilisateur	motDePasse	role	
    protected $DBGroup = 'default';
     

    protected $table      = 'intervenant';
    protected $primaryKey = 'dni';


    protected $useAutoIncrement = false;

    protected $returnType     = \App\Entities\Intervenant::class; 
    protected $useSoftDeletes = true;
    protected $allowedFields = ['dni','nom','prenom','adresse','naissance','numProf','statut','utilisateur','motDePasse','role','deleted','depIUT'];     

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';
    
     
     protected function initialize()
    {
  
    }

    function obtenirMaxDniDB($builder) : int
    {
        try 
			{
				$posId = 0;
				//$connexion = \Config\Database::connect();
				//$builder = $connexion->table($table);
				//$builder = $this->builder();
				$query = $builder->select('dni')
												 ->orderBy('created', 'DESC')
												 ->limit(1)
												 ->get();
												 
				$resultats = $query->getResult();
				if (count($resultats) > 0)
				{
			  		$dernierId = $resultats[0]->dni;
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
?>