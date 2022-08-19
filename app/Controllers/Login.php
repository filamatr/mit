<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        //return view('admin/login');
        return view('mit/login');
    }
    public function test()
    {
        //return view('admin/login');
        echo 'Test method';
    }
    public function check()
    {
        //return view('admin/login');
        
    }
}
