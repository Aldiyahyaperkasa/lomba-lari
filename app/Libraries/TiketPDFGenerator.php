<?php

namespace App\Libraries;

use Dompdf\Dompdf;

class TiketPDFGenerator
{
    public static function generate($peserta, $qrPath, $outputPath)
    {
        $dompdf = new Dompdf();

        // Cek apakah QR tersedia
        $qrBase64 = '';
        if (file_exists($qrPath)) {
            $qrBase64 = base64_encode(file_get_contents($qrPath));
        }

        // Cek apakah banner tersedia
        $bannerBase64 = '';
        $bannerPath = FCPATH . 'assets/gambar/banner-memanjang.png'; // Menentukan path absolut
        if (file_exists($bannerPath)) {
            $bannerBase64 = base64_encode(file_get_contents($bannerPath));
        }

        // HTML tampilan tiket dengan desain baru dan kombinasi warna yang diminta
        $html = '
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Tiket Peserta</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f5f5f5;
                }
                .ticket {
                    width: 100%;
                    background: #fff;
                    border: 2px solid #003366;
                    padding: 20px;
                    box-sizing: border-box;
                    position: relative;
                    max-width: 210mm;
                    max-height: 297mm;
                    margin: 0 auto;
                }
                .header {
                    text-align: center;
                    padding-bottom: 20px;
                    height: 80mm; /* Menentukan tinggi area banner */
                    background-image: url("data:image/png;base64,' . $bannerBase64 . '");
                    background-position: center center;
                    background-size: cover; /* Menampilkan bagian tengah banner */
                    background-repeat: no-repeat;
                    width: 100%;
                }
                .qr-code {
                    text-align: center;
                    margin-top: 15px;
                }
                .qr-code img {
                    width: 220px; /* Memperbesar QR */
                    height: 220px;
                    border: 4px solid #003366;
                    padding: 4px;
                    background: #fff;
                }
                .qr-text {
                    font-size: 16px;
                    margin-top: 10px;
                    font-weight: bold;
                    text-align: center;
                    color: #003366;
                }
                .nama-peserta {
                    font-size: 30px;
                    text-align: center;
                    margin-top: 20px;
                    font-weight: bold;
                    color: #f72585;
                }
                hr {
                    margin: 20px 0;
                    border: 1px solid #ddd;
                }
                .info {
                    margin: 10px 0;
                    font-size: 14px;
                    color: #003366;
                }
                .label {
                    font-weight: bold;
                    display: inline-block;
                    width: 140px;
                    color: #0095D9;
                }
                .highlight {
                    font-size: 16px;
                    color: #f72585;
                }
                .note {
                    margin-top: 30px;
                    font-size: 12px;
                    color: #FFD700;
                    font-style: italic;
                    text-align: center;
                }
                .footer {
                    margin-top: 40px;
                    text-align: center;
                    font-size: 10px;
                    color: #003366;
                    font-style: italic;
                }
            </style>
        </head>
        <body>
            <div class="ticket">
                <div class="header"></div>

                <div class="qr-code">';
        
        if ($qrBase64) {
            $html .= '<img src="data:image/png;base64,' . $qrBase64 . '" alt="Kode QR">
                      <div class="qr-text">' . $peserta['kode_qr'] . '</div>';
        } else {
            $html .= '<p><strong>Kode QR belum tersedia</strong></p>';
        }

        $html .= '
                </div>

                <div class="nama-peserta">' . $peserta['nama_peserta'] . '</div>
                <hr>
                <div class="info"><span class="label">Nomor Peserta:</span> <strong class="highlight">' . $peserta['nomor_peserta'] . '</strong></div>
                <div class="info"><span class="label">NIK:</span> ' . $peserta['nik'] . '</div>
                <div class="info"><span class="label">Alamat:</span> ' . $peserta['alamat'] . '</div>
                <div class="info"><span class="label">Ukuran Baju:</span> ' . $peserta['ukuran_baju'] . '</div>
                <div class="info"><span class="label">Riwayat Penyakit:</span> ' . $peserta['riwayat_penyakit'] . '</div>

                <div class="note">
                    Harap membawa tiket ini saat pengambilan nomor dan baju peserta.
                </div>

                <div class="footer">
                    Sangatta Festival Run 2025 - All Rights Reserved
                </div>
            </div>
        </body>
        </html>';

        // Proses PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Mengubah ke format portrait
        $dompdf->set_option('isHtml5ParserEnabled', true); // Mengaktifkan HTML5 Parser
        $dompdf->set_option('isPhpEnabled', true); // Mengaktifkan PHP jika diperlukan
        $dompdf->render();

        // Simpan ke file
        file_put_contents($outputPath, $dompdf->output());
    }
}
