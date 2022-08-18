<?php
namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\UeModel;


class Ecue extends Controller
{
    public function index()
    {
        $model_ue=new UeModel();
        $data=['ue'=>$model_ue->findAll()];
        return view('admin/ecue/form',$data);
    }
    public function add()
    {
        if (null !== ($this->request->getVar('valid'))) {
            $data_ecue['nom_ecue'] = $this->request->getVar('nom_ecue');
            $data_ecue['credit'] = $this->request->getVar('credit');
            $data_ecue['id_mention'] = $this->request->getVar('id_mention');
            $data_ecue['id_enseignant'] = $this->request->getVar('id_enseignant');
            $model = new UeModel();
            if (!$model->check($data_ecue)) {
                //echo 'Bac OK!';
                $model->insert($data_ecue);
                //return view ('admin/inscription/add_new_student',$data);
                //           print_r($data);
                echo 'Data inserted!';
                
            } else {
                echo 'Not authorized!';
            }
            // $response=
            // if($response==true){
            // echo "Records Saved Successfully";
            // }
            // else{
            // echo "Insert error !";
            // }
        }
        
    }
}

