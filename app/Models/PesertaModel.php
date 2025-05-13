<?php

namespace App\Models;
use CodeIgniter\Model;


class PesertaModel extends Model
{
    protected $table = 'peserta'; // Sesuaikan dengan nama tabel kamu
    protected $primaryKey = 'id_peserta';
    protected $allowedFields = [
        'username', 'password', 'nama_peserta', 'tanggal_lahir', 'no_telepon', 'alamat', 'nik', 'email',
        'jenis_kelamin', 'kategori_lari', 'ukuran_baju', 'usia', 'no_telepon_darurat_1', 
        'no_telepon_darurat_2', 'status_pendaftaran', 'riwayat_penyakit', 'bukti_pembayaran',
        'updated_at', 'nomor_peserta',
    ];


    // Metode untuk menghitung peserta berdasarkan kategori dan status
    public function countPesertaByKategoriAndStatus(string $kategori, array $status = ['Terkonfirmasi', 'Menunggu']): int
    {
        return $this->where('kategori_lari', $kategori)
                    ->whereIn('status_pendaftaran', $status)
                    ->countAllResults();
    }

    public function generateNomorPeserta(string $kategori)
    {
        // Tentukan awalan dan batas maksimal berdasarkan kategori
        if ($kategori === 'Umum') {
            $prefix = 'SFRU-';
            $startNumber = 2025;
            $maxNumber = 2000;
        } elseif ($kategori === 'Pelajar') {
            $prefix = 'SFRP-';
            $startNumber = 2025;
            $maxNumber = 200;
        } else {
            throw new \Exception('Kategori tidak valid.');
        }

        // Ambil semua nomor peserta yang sudah ada untuk kategori ini
        $existing = $this->select('nomor_peserta')
            ->where('kategori_lari', $kategori)
            ->where('nomor_peserta IS NOT NULL', null, false)
            ->findAll();

        // Ekstrak angka dari nomor peserta (misalnya 2025 dari SFRU-2025)
        $usedNumbers = [];
        foreach ($existing as $row) {
            if (preg_match('/(\d+)$/', $row['nomor_peserta'], $matches)) {
                $usedNumbers[] = (int) $matches[1];
            }
        }

        // Cari nomor terkecil yang belum digunakan
        for ($i = 0; $i < $maxNumber; $i++) {
            $nextNumber = $startNumber + $i;
            if (!in_array($nextNumber, $usedNumbers)) {
                return $prefix . $nextNumber;
            }
        }

        // Jika sudah melebihi kuota
        throw new \Exception('Kuota peserta kategori ' . $kategori . ' telah penuh.');
    }



    public function getPesertaWithKodeQR($id_peserta)
    {
        return $this->select('peserta.*, kode_qr.kode_qr')
                    ->join('kode_qr', 'kode_qr.id_peserta = peserta.id_peserta', 'left')
                    ->where('peserta.id_peserta', $id_peserta)
                    ->first();
    }


}
