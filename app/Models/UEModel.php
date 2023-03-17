<?php 
namespace App\Models;
use CodeIgniter\Model;

class UEModel extends Model
{
    //id	code	credits	volume	description	semestre
    protected $DBGroup = 'default';
     

    protected $table      = 'ue';
    protected $primaryKey = 'id';


    protected $useAutoIncrement = false;

    protected $returnType     = \App\Entities\UE::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['code','credits','volume','description','semestre','deleted'];     

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