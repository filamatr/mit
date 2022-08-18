<?php
namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\UeModel;
use App\Models\ParcoursModel;

class Ue extends Controller
{
    public function index()
    {
        $model_parcours=new ParcoursModel();   
        $data=['parcours'=>$model_parcours->findAll()];
        return view('admin/ue/form',$data);
    }
    public function add()
    {
        if (null !== ($this->request->getVar('valid'))) {
            $data_ue['nom_ue'] = $this->request->getVar('nom_ue');
            $data_ue['credit'] = $this->request->getVar('credit');
            $data_ue['id_parcours'] = $this->request->getVar('id_parcours');
            $data_ue['semestre'] = $this->request->getVar('semestre');
            $model = new UeModel();
            if (!$model->check($data_ue)) {
                //echo 'Bac OK!';
                $model->insert($data_ue);
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

