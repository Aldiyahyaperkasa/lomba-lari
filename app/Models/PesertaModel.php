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
        // Menentukan prefix dan maksimal panjang nomor berdasarkan kategori
        if ($kategori === 'Umum') {
            $prefix = 'U-';
            $maxLength = 4; // Maksimal 2000 (4 digit)
            $maxNumber = 2000;
        } else if ($kategori === 'Pelajar') {
            $prefix = 'P-';
            $maxLength = 3; // Maksimal 200 (3 digit)
            $maxNumber = 200;
        } else {
            throw new \Exception('Kategori tidak valid.');
        }

        // Ambil nomor peserta terbesar untuk kategori ini
        $lastPeserta = $this->select('nomor_peserta')
            ->where('kategori_lari', $kategori)
            ->where('nomor_peserta IS NOT NULL', null, false)
            ->orderBy('nomor_peserta', 'DESC')
            ->first();

        if ($lastPeserta && preg_match('/\d+$/', $lastPeserta['nomor_peserta'], $matches)) {
            $lastNumber = (int) $matches[0];
        } else {
            $lastNumber = 0;
        }

        // Menghitung nomor peserta berikutnya
        $nextNumber = $lastNumber + 1;

        // Pastikan nomor tidak melebihi batas maksimal
        if ($nextNumber > $maxNumber) {
            throw new \Exception('Nomor peserta sudah mencapai batas maksimal untuk kategori ' . $kategori);
        }

        // Format nomor peserta dengan leading zero jika perlu
        return $prefix . str_pad($nextNumber, $maxLength, '0', STR_PAD_LEFT);
    }

}
