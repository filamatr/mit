<?php namespace app\Models;
//use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Model;

class BacModel extends Model
{
    protected $table = 'bac';
    
    protected $allowedFields = ['num_bacc', 'nom_prenoms','serie','annee','moyenne'];
    
    public function search ()
    {
       // $query = "SELECT * FROM bac nom_prenoms like '%Tahiry%'";
        
        //$query=$this->db->query($query);
        //return $query->getResult();
        //return 'test';
        
        //$query = $this->where( ['num_bacc' => '7310001'] )
        //->findAll();
        //return $query->getResult();
        
        //$query = $this->db->table($this->table)->select('num_bacc, nom_prenoms, serie')->get();
        $query = $this->db->table($this->table)->select('num_bacc, nom_prenoms, serie')->get();
        return $query->getResult();
    }
}