<?php
namespace app\Models;

use CodeIgniter\Model;

class InscriptionModel extends Model
{
    protected $table = 'inscription';
    protected $primaryKey = 'id_inscription';
    
    protected $allowedFields =[
      'id_etudiant',
        'id_parcours',
        'grade',
        'niveau',
        'situation',
        'id_annee_u'
    ];
    
    public function getInscriptionEtudiant() {
        $query = $this->db->table('inscription_etudiant')->get();
        return $query->getResult();
    }
    public function getInscriptionEtudiantParcoursGradeNiveau($data) {
        $criteria=['id_parcours'=>$data['id_parcours'],'grade'=>$data['grade'],'niveau'=>$data['niveau']];
        $query = $this->db->table('inscription_etudiant')->where($criteria)->get();
        return $query->getResult();
    }
    
}

