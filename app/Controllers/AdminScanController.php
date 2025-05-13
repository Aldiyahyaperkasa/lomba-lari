<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KodeQRModel;
use App\Models\PesertaModel;


class AdminScanController extends BaseController
{
    protected $kodeQRModel;
    protected $pesertaModel;

    public function __construct()
    {
        $this->kodeQRModel = new KodeQRModel();
        $this->pesertaModel = new PesertaModel();
    }
    
    
    public function index()
    {
        return view('admin_scan/scan');
    }
    
    // Proses hasil scan
    public function prosesScan()
    {
        $kodeQR = $this->request->getPost('kode_qr');

        $dataQR = $this->kodeQRModel
            ->where('kode_qr', $kodeQR)
            ->first();

        if (!$dataQR) {
            return redirect()->to('/AdminScanController/index')->with('error', 'Kode QR tidak ditemukan!');
        }

        // Ambil data peserta berdasarkan id_peserta
        $peserta = $this->pesertaModel
            ->where('id_peserta', $dataQR['id_peserta'])
            ->first();

        // Cek apakah sudah pernah mengambil
        if ($dataQR['status_pengambilan'] === 'Sudah Diambil') {
            session()->setFlashdata('sudah_diambil', [
                'nomor_peserta'     => $peserta['nomor_peserta'] ?? '-',
                'nama_peserta'      => $peserta['nama_peserta'] ?? '-',
            ]);
            return redirect()->to('/AdminScanController/index');
        }

        // Update status pengambilan
        $this->kodeQRModel->update($dataQR['id_qr'], ['status_pengambilan' => 'Sudah Diambil']);

        // Kirim data peserta ke flashdata untuk ditampilkan di view
        session()->setFlashdata('success_detail', [
            'nomor_peserta'     => $peserta['nomor_peserta'] ?? '-',
            'nik'               => $peserta['nik'] ?? '-',
            'nama_peserta'      => $peserta['nama_peserta'] ?? '-',
            'alamat'            => $peserta['alamat'] ?? '-',
            'ukuran_baju'       => $peserta['ukuran_baju'] ?? '-',
            'riwayat_penyakit'  => $peserta['riwayat_penyakit'] ?? '-',
        ]);

        return redirect()->to('/AdminScanController/index');
    }

}
