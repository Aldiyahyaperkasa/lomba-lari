<?php

namespace App\Models;
use CodeIgniter\Model;


class PesertaModel extends Model
{
    protected $table = 'peserta'; // Sesuaikan dengan nama tabel kamu
    protected $primaryKey = 'id_peserta';
    protected $allowedFields = [
        'username', 'password', 'nama_peserta', 'no_telepon', 'nik', 'email',
        'jenis_kelamin', 'ukuran_baju', 'asal_daerah', 'status_pendaftaran',
        'bukti_pembayaran', 'kategori_lari'
    ];


    // Metode untuk menghitung peserta berdasarkan kategori dan status
public function countPesertaByKategoriAndStatus(string $kategori, array $status = ['Terkonfirmasi', 'Menunggu']): int
{
    return $this->where('kategori_lari', $kategori)
                ->whereIn('status_pendaftaran', $status)
                ->countAllResults();
}
}
