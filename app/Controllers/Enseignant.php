<?php
namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\EnseignantModel;

class Enseignant extends Controller
{

    public function index()
    {
        return view('admin/enseignant/form');
    }

    public function add()
    {
        if (null !== ($this->request->getVar('valid'))) {
            $data_prof['nom'] = strtoupper(trim($this->request->getVar('nom')));
            $data_prof['prenoms'] = strtoupper(trim($this->request->getVar('prenoms')));
            $data_prof['matricule'] = trim($this->request->getVar('matricule'));
            $data_prof['tel'] = trim($this->request->getVar('tel'));
            $data_prof['email'] = strtolower(trim($this->request->getVar('email')));
            $data_prof['adresse'] = trim($this->request->getVar('adresse'));
            $model = new EnseignantModel();
            
            if (! $model->check($data_prof)) {
                $model->insert($data_prof);
                echo 'Data inserted!';
            } else {
                echo 'Not authorized!';
            }
            
        }
    }
}

