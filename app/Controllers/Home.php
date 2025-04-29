<?php

namespace App\Controllers;
use App\Models\PesertaModel;

class Home extends BaseController
{
    public function index()
    {        
        return view('home/index');
    }
}
