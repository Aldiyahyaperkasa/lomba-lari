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

        // HTML tampilan tiket dengan desain baru
        $html = '
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Tiket Peserta</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                }
                .ticket {
                    width: 100%;
                    background: #fff;
                    border: 4px dashed #333;
                    padding: 30px;
                    position: relative;
                }
                .header {
                    text-align: center;
                    border-bottom: 2px solid #000;
                    padding-bottom: 10px;
                    margin-bottom: 20px;
                }
                .header h1 {
                    font-size: 28px;
                    color: #d32f2f;
                    margin: 0;
                }
                .header p {
                    font-size: 16px;
                    color: #555;
                }
                .info {
                    margin: 10px 0;
                    font-size: 16px;
                }
                .label {
                    font-weight: bold;
                    display: inline-block;
                    width: 160px;
                }
                .highlight {
                    font-size: 18px;
                    color: #2e7d32;
                }
                .main-info {
                    background-color: #e3f2fd;
                    padding: 20px;
                    border-radius: 10px;
                    margin-bottom: 20px;
                }
                .qr-code {
                    text-align: right;
                    margin-top: 20px;
                }
                .qr-code img {
                    height: 140px;
                    border: 2px solid #000;
                    padding: 4px;
                    background: #fff;
                }
                .qr-text {
                    margin-top: 8px;
                    font-size: 14px;
                    word-break: break-word;
                }
                .note {
                    margin-top: 30px;
                    font-size: 14px;
                    color: #777;
                    font-style: italic;
                }
            </style>
        </head>
        <body>
            <div class="ticket">
                <div class="header">
                    <h1>TIKET PESERTA LOMBA LARI</h1>
                    <p>Sangatta Festival Run 2025</p>
                </div>
                <div class="main-info">
                    <div class="info"><span class="label">Status Pendaftaran:</span> <span class="highlight">' . $peserta['status_pendaftaran'] . '</span></div>
                    <div class="info"><span class="label">Nomor Peserta:</span> <strong>' . $peserta['nomor_peserta'] . '</strong></div>
                    <div class="info"><span class="label">Nama Peserta:</span> ' . $peserta['nama_peserta'] . '</div>
                    <div class="info"><span class="label">Ukuran Baju:</span> ' . $peserta['ukuran_baju'] . '</div>
                    <div class="info"><span class="label">NIK:</span> ' . $peserta['nik'] . '</div>
                </div>
                <div class="qr-code">';

        if ($qrBase64) {
            $html .= '<img src="data:image/png;base64,' . $qrBase64 . '" alt="Kode QR">
                      <div class="qr-text">' . $peserta['kode_qr'] . '</div>';
        } else {
            $html .= '<p><strong>Kode QR belum tersedia</strong></p>';
        }

        $html .= '
                </div>
                <div class="note">
                    Harap membawa tiket ini saat pengambilan nomor dan baju peserta.
                </div>
            </div>
        </body>
        </html>';

        // Proses PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Simpan ke file
        file_put_contents($outputPath, $dompdf->output());
    }
}
