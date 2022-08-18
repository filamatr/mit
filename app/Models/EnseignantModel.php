<?php
namespace app\Models;

use CodeIgniter\Model;

class EnseignantModel extends Model
{
    protected $table = 'enseignant';
    
    protected $primaryKey = 'id_enseignant';
    
    protected $allowedFields = [
        'nom',
        'prenoms',
        'matricule',
        'tel',
        'email',
        'adresse',
        'grade'
    ];
    public function check($data)
    {
        $criteria = [
            'nom' => $data['nom'],
            'prenoms' => $data['prenoms'],
            'matricule' => $data['matricule']
            
        ];
        $nb_results = $this->db->table($this->table)
        ->where($criteria)
        ->countAllResults();
        if($nb_results>0)
            return true;
            else return false;
    }
}

