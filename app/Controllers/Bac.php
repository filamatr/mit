<?php namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\BacModel;

class Bac extends Controller
{
    public function index()
    {
        $model = new BacModel();
        
        $data = [
            'bacs' => $model->paginate(10),
            'pager' => $model->pager
        ];
        
        return view('admin/bac-all', $data);
    }
    public function recherche()
    {
       $model = new BacModel();
       /*$data = [
           'bacs' => $model->searchForNum('7310110')->paginate(10),
           'pager' => $model->pager
       ];*/
       
       //$query = $this->where( ['num_bacc' => '7310001'] )
       //->findAll();
//        $data = [
//            'bacs' => $model->search()
           
//        ];
//        return view('admin/bac', $data);
      
       
     //  echo 'test';
       
      // print_r($data['bacs']);
    }
}