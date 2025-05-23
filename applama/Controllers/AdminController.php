<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesertaModel;
use App\Models\AdminModel;


class AdminController extends BaseController
{
    public function index()
    {
        $pesertaModel = new PesertaModel();

        $terbaruUmum = $pesertaModel->where('kategori_lari', 'Umum')
                                    ->orderBy('id_peserta', 'DESC')
                                    ->limit(5)
                                    ->find();

        $terbaruPelajar = $pesertaModel->where('kategori_lari', 'Pelajar')
                                       ->orderBy('id_peserta', 'DESC')
                                       ->limit(5)
                                       ->find();

        return view('admin/dashboard_admin', [
            'terbaruUmum'    => $terbaruUmum,
            'terbaruPelajar' => $terbaruPelajar
        ]);
    }

}
