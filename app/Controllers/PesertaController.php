<?php
namespace App\Controllers;
use App\Models\PesertaModel;

class PesertaController extends BaseController
{
    public function index()
    {
        $id_peserta = session()->get('id_peserta');
        if (!$id_peserta) {
            return redirect()->to('/login');
        }

        $pesertaModel = new PesertaModel();
        $peserta = $pesertaModel->find($id_peserta);

        return view('peserta/dashboard_peserta', ['peserta' => $peserta]);
    }


}