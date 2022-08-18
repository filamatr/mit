<?php
namespace app\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'note';
    
    protected $primaryKey = 'id_note';
    
    protected $allowedFields = [
        'id_inscription',
        'note',
        'id_ecue',
        'id_examen'
        
    ];
}

