<?php
namespace App\Models;
use CodeIgniter\Model;

class AssurerModel extends Model
{
// La configuration de base de données à utiliser.
     protected $DBGroup = 'default';
     // id	debut	fin	intervenant	module

    protected $table      = 'Assurer';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Assurer::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['debut','fin', 'intervenant','module', 'deleted'];
     
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

}
    