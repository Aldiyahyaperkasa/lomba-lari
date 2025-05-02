<?php

namespace App\Controllers;

use App\Models\PesertaModel;

class AdminPesertaController extends BaseController
{
    protected $pesertaModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
    }

    // Peserta yang mendaftar dan masih menunggu konfirmasi
    public function menunggu()
    {
        $kategori_lari = $this->request->getGet('kategori_lari');
        
        // Jika kategori lari dipilih, filter berdasarkan kategori tersebut
        if ($kategori_lari) {
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Menunggu')
                ->where('kategori_lari', $kategori_lari)
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        } else {
            // Jika tidak ada kategori lari yang dipilih, tampilkan semua peserta yang menunggu
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Menunggu')
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        }

        $data['title'] = 'Peserta Mendaftar';
        
        return view('admin/peserta/peserta_mendaftar', $data);
    }

    // Peserta yang sudah terkonfirmasi
    public function terkonfirmasi()
    {
        $kategori_lari = $this->request->getGet('kategori_lari');
        
        // Jika kategori lari dipilih, filter berdasarkan kategori tersebut
        if ($kategori_lari) {
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->where('kategori_lari', $kategori_lari)
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        } else {
            // Jika tidak ada kategori lari yang dipilih, tampilkan semua peserta yang terkonfirmasi
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        }

        $data['title'] = 'Peserta Terkonfirmasi';
        
        return view('admin/peserta/peserta_terkonfirmasi', $data);
    }

    public function buktiBayar($filename)
    {
        $path = WRITEPATH . '../public/uploads/' . $filename;

        if (!file_exists($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("File tidak ditemukan.");
        }

        return response()
            ->download($path, null)
            ->setFileName($filename)
            ->setContentType(mime_content_type($path));
    }


    public function konfirmasi($id)
    {
        $this->pesertaModel->update($id, ['status_pendaftaran' => 'Terkonfirmasi']);
        return redirect()->back()->with('success', 'Peserta berhasil dikonfirmasi.');
    }

    public function tolak($id)
    {
        $this->pesertaModel->update($id, ['status_pendaftaran' => 'Ditolak']);
        return redirect()->back()->with('success', 'Peserta berhasil ditolak.');
    }

}
