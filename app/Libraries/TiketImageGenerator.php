<?php
namespace App\Libraries;

namespace App\Libraries;

class TiketImageGenerator
{
    public static function generate($peserta, $qrPath, $outputPath)
    {
        $width = 800;
        $height = 600;
        $image = imagecreatetruecolor($width, $height);

        // Warna untuk background dan teks
        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);
        $blue = imagecolorallocate($image, 0, 0, 255);
        imagefilledrectangle($image, 0, 0, $width, $height, $white);

        // Tambahkan banner (pastikan PNG transparan atau ukuran sesuai)
        $bannerPath = FCPATH . 'assets/gambar/maskot-withbg.jpeg';
        if (file_exists($bannerPath)) {
            $banner = imagecreatefromjpeg($bannerPath);
            imagecopyresampled($image, $banner, 0, 0, 0, 0, 800, 150, imagesx($banner), imagesy($banner));
        }

        // Tambahkan teks (Nama, Kategori, Ukuran Baju, Nomor Peserta, Kode QR)
        $y = 160; // Memulai di bawah banner
        $fontSize = 5;

        // Nama
        imagestring($image, $fontSize, 50, $y, 'Nama: ' . $peserta['nama_peserta'], $black); $y += 40;
        
        // Kategori
        imagestring($image, $fontSize, 50, $y, 'Kategori: ' . $peserta['kategori_lari'], $black); $y += 40;
        
        // Ukuran Baju
        imagestring($image, $fontSize, 50, $y, 'Ukuran Baju: ' . $peserta['ukuran_baju'], $black); $y += 40;
        
        // Nomor Peserta
        imagestring($image, $fontSize, 50, $y, 'Nomor Peserta: ' . $peserta['nomor_peserta'], $black); $y += 40;
        
        // Kode QR
        if (array_key_exists('kode_qr', $peserta)) {
            imagestring($image, $fontSize, 50, $y, 'Kode QR: ' . $peserta['kode_qr'], $black);
        } else {
            imagestring($image, $fontSize, 50, $y, 'Kode QR: Tidak tersedia', $black);
        }
        $y += 40;


        // Tambahkan QR code ke tiket
        if (file_exists($qrPath)) {
            $qr = imagecreatefrompng($qrPath);
            imagecopyresampled($image, $qr, 550, 200, 0, 0, 200, 200, imagesx($qr), imagesy($qr));
        }

        // Simpan gambar tiket sebagai file PNG
        imagepng($image, $outputPath);

        // Hapus gambar dari memori setelah selesai
        imagedestroy($image);
    }
}
