<?php

namespace App\Controllers;
use App\Models\PesertaModel;

class Home extends BaseController
{
    public function index()
    {
        $pesertaModel = new PesertaModel();

        // Membatasi hanya 20 peserta yang ditampilkan per kategori
        $umum = $pesertaModel
            ->where('status_pendaftaran', 'Terkonfirmasi')
            ->where('kategori_lari', 'Umum')
            ->limit(20) // Batasi hanya 20 peserta
            ->findAll();

        $pelajar = $pesertaModel
            ->where('status_pendaftaran', 'Terkonfirmasi')
            ->where('kategori_lari', 'Pelajar')
            ->limit(20) // Batasi hanya 20 peserta
            ->findAll();

        return view('home/index', [
            'umum' => $umum,
            'pelajar' => $pelajar
        ]);
    }

    // Halaman untuk melihat semua peserta
    public function semuaPeserta()
    {
        $pesertaModel = new PesertaModel();

        $kategori = $this->request->getGet('kategori'); // ambil parameter dari URL

        if ($kategori === 'Umum') {
            $data['umum'] = $pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->where('kategori_lari', 'Umum')
                ->findAll();
            $data['pelajar'] = []; // kosongkan pelajar
        } elseif ($kategori === 'Pelajar') {
            $data['pelajar'] = $pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->where('kategori_lari', 'Pelajar')
                ->findAll();
            $data['umum'] = []; // kosongkan umum
        } else {
            // Jika tidak ada kategori yang dipilih, tampilkan semua
            $data['umum'] = $pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->where('kategori_lari', 'Umum')
                ->findAll();

            $data['pelajar'] = $pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->where('kategori_lari', 'Pelajar')
                ->findAll();
        }

        return view('home/semua_peserta', $data);
    }


    public function maintenance() {
        return view('home/maintenance');
    }

}

