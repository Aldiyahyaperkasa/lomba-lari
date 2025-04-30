<?php

namespace App\Models;
use CodeIgniter\Model;


class PesertaModel extends Model
{
    protected $table = 'peserta'; // Sesuaikan dengan nama tabel kamu
    protected $primaryKey = 'id_peserta';
    protected $allowedFields = [
        'username', 'password', 'nama_peserta', 'tanggal_lahir', 'no_telepon', 'alamt', 'nik', 'email',
        'jenis_kelamin', 'kategori_lari', 'ukuran_baju', 'usia', 'no_telepon_darurat_1', 
        'no_telepon_darurat_2', 'status_pendaftaran', 'riwayat_penyakit', 'bukti_pembayaran',
    ];


    // Metode untuk menghitung peserta berdasarkan kategori dan status
public function countPesertaByKategoriAndStatus(string $kategori, array $status = ['Terkonfirmasi', 'Menunggu']): int
{
    return $this->where('kategori_lari', $kategori)
                ->whereIn('status_pendaftaran', $status)
                ->countAllResults();
}
}
