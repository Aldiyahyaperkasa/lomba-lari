<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\KodeQRModel;

class LaporanController extends BaseController
{
    public function terkonfirmasi()
    {
        $pesertaModel = new PesertaModel();
        $data['peserta'] = $pesertaModel->where('status_pendaftaran', 'Terkonfirmasi')->findAll();
        return view('admin/laporan/laporan_terkonfirmasi', $data);
    }

    public function laporanSudahAmbilBaju()
    {
        $qrModel = new KodeQRModel();
        $data['peserta'] = $qrModel
            ->select('peserta.*, kode_qr.status_pengambilan, kode_qr.waktu_generate')
            ->join('peserta', 'peserta.id_peserta = kode_qr.id_peserta')
            ->where('kode_qr.status_pengambilan', 'Sudah Diambil')
            ->findAll();

        return view('admin/laporan/laporan_sudah_ambil_baju', $data);
    }
}
