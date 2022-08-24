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

    public function getNoteById_inscription_IdEcue($criteria)
    {
        $query = $this->db->table($this->table)
            ->where($criteria)
            ->get();
        $result = $query->getFirstRow();
        // return $query->getResult();
        if ($result)
            return $result->note;
        else
            return 0;
    }
}

