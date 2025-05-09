<?php

namespace App\Controllers;

use App\Models\KodeQRModel;
use App\Models\PesertaModel;

class PengambilanBajuController extends BaseController
{
    protected $kodeQRModel;
    protected $pesertaModel;

    public function __construct()
    {
        $this->kodeQRModel = new KodeQRModel();
        $this->pesertaModel = new PesertaModel();
    }

    // View kamera QR
    public function scan()
    {
        return view('admin/pengambilan/scan');
    }

    // Proses hasil scan
    public function prosesScan()
    {
        $kodeQR = $this->request->getPost('kode_qr');

        $dataQR = $this->kodeQRModel
            ->where('kode_qr', $kodeQR)
            ->first();

        if (!$dataQR) {
            return redirect()->to('/admin/pengambilan/scan')->with('error', 'Kode QR tidak ditemukan!');
        }

        // Update status pengambilan
        $this->kodeQRModel->update($dataQR['id_qr'], ['status_pengambilan' => 'Sudah Diambil']);

        return redirect()->to('/admin/pengambilan/scan')->with('success', 'Pengambilan baju berhasil dicatat!');
    }


    // Halaman manual
    public function manual()
    {
        $keyword = $this->request->getGet('keyword');

        $peserta = [];

        if ($keyword) {
            $peserta = $this->pesertaModel
                ->like('nama_peserta', $keyword)
                ->orLike('nomor_peserta', $keyword)
                ->orLike('nik', $keyword)
                ->orLike('kategori_lari', $keyword)
                ->findAll();
        }

        return view('admin/pengambilan/manual', ['peserta' => $peserta, 'keyword' => $keyword]);
    }

    public function updateManual($id_peserta)
    {
        $kodeQR = $this->kodeQRModel->where('id_peserta', $id_peserta)->first();

        if ($kodeQR) {
            $this->kodeQRModel->update($kodeQR['id_qr'], ['status_pengambilan' => 'Sudah Diambil']);
        }

        return redirect()->back()->with('success', 'Status pengambilan berhasil diperbarui.');
    }
}
