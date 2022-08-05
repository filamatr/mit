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
        
        return view('admin/bac', $data);
    }
}