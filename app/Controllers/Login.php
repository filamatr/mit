<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }
    public function test()
    {
        //return view('admin/login');
        echo 'Test method';
    }
}
