<?php namespace app\Models;
//use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Model;


class BacModel extends Model
{
    protected $table = 'bac';
    
    protected $allowedFields = ['num_bacc', 'nom_prenoms','serie','annee','moyenne','nom','prenoms'];
    
    public function search ($data)
    {
       // $query = "SELECT * FROM bac nom_prenoms like '%Tahiry%'";
        
        //$query=$this->db->query($query);
        //return $query->getResult();
        //return 'test';
        
        //$query = $this->where( ['num_bacc' => '7310001'] )
        //->findAll();
        //return $query->getResult();
        
        //$query = $this->db->table($this->table)->select('num_bacc, nom_prenoms, serie')->get();
        //$query = $this->db->table($this->table)->select('num_bacc, nom_prenoms, serie')->get();
        $criteria = ['num_bacc' => $data['num_bacc'], 'serie' => $data['serie'], 'annee' => $data['annee']];
        $query = $this->db->table($this->table)->where($criteria)->get();
        return $query->getResult();
    }
    public function check($data)
    {
       // $criteria = ['num_bacc' => $num_bacc, 'id <' => $id, 'date >' => $date];
        $criteria = ['num_bacc' => $data['num_bacc'], 'serie' => $data['serie'], 'annee' => $data['annee']];
        $nb_results = $this->db->table($this->table)->where($criteria)->countAllResults();
        return $nb_results;
    }
}