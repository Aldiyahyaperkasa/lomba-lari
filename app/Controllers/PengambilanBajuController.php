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
            return redirect()->to('/admin/pengambilan/scan');
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

        return redirect()->to('/admin/pengambilan/scan');
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
