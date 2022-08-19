<?php
namespace app\Models;

use CodeIgniter\Model;

class EcueModel extends Model
{
    protected $table = 'ecue';
    
    protected $primaryKey = 'id_ecue';
    
    protected $allowedFields = [
        'nom_ecue',
        'credit',
        'id_ue',
        'id_enseignant'
    ];
    public function getEcueFromUe($id_ue) {
        
        $criteria = ['id_ue' => $id_ue];
        $query = $this->db->table($this->table)->where($criteria)->get();
        return $query->getResult();
    
    }
}

