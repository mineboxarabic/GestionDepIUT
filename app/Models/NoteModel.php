<?php 
namespace App\Models;
use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $DBGroup = 'default';
     

    protected $table      = 'note';
    protected $primaryKey = 'dni';

    protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\note::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = [ 'note','commentaires','controle','etudiant','deleted'];     

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';
    
     
     protected function initialize()
    {
  
    }

 function obtenirMaxId($builder) : int
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
?>