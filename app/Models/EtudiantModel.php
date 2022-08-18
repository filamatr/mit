<?php
namespace app\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{

    protected $table = 'etudiant';

    protected $allowedFields = [
        'id_etudiant',
        'num_bacc',
        'nom_prenoms',
        'serie',
        'annee',
        'ldn',
        'nom',
        'prenoms',
        'ddn',
        'adresse',
        'tel',
        'email',
        'genre',
        'cin'
    ];

    public function isExist($data)
    {
        $criteria = [
            'nom' => $data['nom'],
            'prenoms' => $data['prenoms'],
            'num_bacc' => $data['num_bacc'],
            'serie' => $data['serie'],
            'annee' => $data['annee']
        ];
        $nb_results = $this->db->table($this->table)
            ->where($criteria)
            ->countAllResults();
            if($nb_results>0)
                return true;
            else return false;
    }
}

