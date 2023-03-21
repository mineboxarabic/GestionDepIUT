<?php 
namespace App\Models;
use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $DBGroup = 'default';
     

    protected $table      = 'note';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Note::class;
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


}
?>