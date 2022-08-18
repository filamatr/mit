<?php
namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\EtudiantModel;
use App\Models\InscriptionModel;

class Etudiant extends Controller
{

    public $id_parcours_default = 80;

    public function add()
    {
        if (null !== ($this->request->getVar('valid'))) {
            $etudiant['num_bacc'] = $this->request->getVar('num_bacc');
            $etudiant['serie'] = $this->request->getVar('serie');
            $etudiant['annee'] = $this->request->getVar('annee');
            $etudiant['nom'] = $this->request->getVar('nom');
            $etudiant['prenoms'] = $this->request->getVar('prenoms');
            $etudiant['adresse'] = $this->request->getVar('adresse');
            $etudiant['tel'] = $this->request->getVar('tel');
            $etudiant['email'] = $this->request->getVar('email');
            $etudiant['cin'] = $this->request->getVar('cin');
            $etudiant['ddn'] = $this->request->getVar('ddn');
            $etudiant['ldn'] = $this->request->getVar('ldn');

            $model = new EtudiantModel();
            // echo 'Id= '.$model->getIdValue($etudiant);
            // $model->insert($etudiant)
            // $user_id = $user->getInsertID();

            //
            if (!$model->isExist($etudiant)) {
                if (true == $model->insert($etudiant)) {
                    $id_etudiant = $model->getInsertID();
                    echo 'ID=' . $id_etudiant;
                    $inscription = new InscriptionModel();
                    $data_inscription = [
                        'id_etudiant' =>  $id_etudiant,
                        'id_parcours' => $this->id_parcours_default,
                        'situation' => 'P',
                        'id_annee' => 1,
                        'niveau' => 1,
                        'grade' => 'L',
                        'id_annee_u' => 1
                    ];
                    $inscription->insert($data_inscription);
                    $id_inscription = $inscription->getInsertID();
                    $test = $inscription->find($id_inscription);
                    print_r($test);

                    // else {
                    // echo 'Error';
                }
            }
        }
    }
}