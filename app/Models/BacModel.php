<?php namespace app\Models;
//use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Model;

class BacModel extends Model
{
    protected $table = 'bac';
    
    protected $allowedFields = ['num_bacc', 'nom_prenoms','serie','annee','moyenne'];
}