<?php 
namespace App\Models;
use CodeIgniter\Model;

class etudiantModel extends Model
{
    //id	nom	credits	description	formation
    protected $DBGroup = 'default';
     

    protected $table      = 'semestre';
    protected $primaryKey = 'id';


    protected $useAutoIncrement = false;

    protected $returnType     = \App\Entities\Semestre::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nom','credits','description','formation','deleted'];     

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