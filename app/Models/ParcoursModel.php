<?php
namespace app\Models;

use CodeIgniter\Model;

class ParcoursModel extends Model
{
    protected $table = 'parcours';
    
    protected $primaryKey = 'id_parcours';
    
    protected $allowedFields = [
        'nom_parcours',
        'id_parcours',
        'id_mention'
    ];
}

