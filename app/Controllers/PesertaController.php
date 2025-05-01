<?php
namespace App\Controllers;
use App\Models\PesertaModel;

class PesertaController extends BaseController
{
    public function index()
    {
        return view('peserta/dashboard_peserta');
    }
}