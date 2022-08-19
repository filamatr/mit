<?php
namespace app\Models;

use CodeIgniter\Model;

class UeModel extends Model
{

    protected $table = 'ue';

    protected $primaryKey = 'id_ue';

    protected $allowedFields = [
        'nom_ue',
        'credit',
        'id_parcours',
        'semestre'
    ];

    public function check($data)
    {
        // $criteria = ['num_bacc' => $num_bacc, 'id <' => $id, 'date >' => $date];
        $criteria = [
            'nom_ue' => $data['nom_ue'],
            'credit' => $data['credit'],
            'id_parcours' => $data['id_parcours'],
            'semestre' => $data['semestre']
        ];
        $nb_results = $this->db->table($this->table)
            ->where($criteria)
            ->countAllResults();
        return $nb_results;
    }
    public function getUeFromParcoursNiveau($data)
    {
        $criteria = ['id_parcours' => $data['id_parcours'], 'semestre' => $data['semestre']];
        $query = $this->db->table($this->table)->where($criteria)->get();
        return $query->getResult();
    }
}