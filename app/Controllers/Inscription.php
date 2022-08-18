<?php
namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\BacModel;

class Inscription extends Controller
{

    public function index()
    {}

    public function form($i = 0)
    {
        return view('admin/inscription/form');
    }

    public function check()
    {
        // return view('admin/inscription/form');
        // echo 'test';
        /* Check submit button */
        if (null !== ($this->request->getVar('valid'))) {
            $data_bac['num_bacc'] = $this->request->getVar('num_bacc');
            $data_bac['serie'] = $this->request->getVar('serie');
            $data_bac['annee'] = $this->request->getVar('annee');
            $model = new BacModel();
            if ($model->check($data_bac)) {
                //echo 'Bac OK!';
                $data = [
                    'etudiant'=>$model->search($data_bac)];
                return view ('admin/inscription/add_new_student',$data);
     //           print_r($data);
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

