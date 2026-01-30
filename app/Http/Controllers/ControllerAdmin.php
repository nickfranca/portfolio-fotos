<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    public function login_admin(){
        return view('admin.login');
    }

    public function index(){
        return view('admin.index');
    }
}
