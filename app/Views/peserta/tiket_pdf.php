<?php
// Cek apakah banner tersedia
$bannerBase64 = '';
$bannerPath = FCPATH . 'assets/gambar/banner-memanjang.png'; // Menentukan path absolut
if (file_exists($bannerPath)) {
    $bannerBase64 = base64_encode(file_get_contents($bannerPath));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Peserta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!--<link rel="icon" href="<?= base_url('assets/gambar/logo.png') ?>" type="image/x-icon">-->
    
    <!-- Favicon untuk browser modern -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/gambar/logo.png') ?>">
    
    <!-- Favicon fallback (format .ico untuk browser lama) -->
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">

    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            position: relative;
            max-width: 210mm;
            max-height: 297mm;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            height: 80mm;
            background-image: url("data:image/png;base64,<?= $bannerBase64 ?>");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #f72585;
        }

        .header p {
            font-size: 16px;
            color: #fff;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 220px;
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
        <div class="header">

        </div>

        <div class="qr-code">
            <?php
            $qrPath = FCPATH . 'qrcodes/' . $peserta['kode_qr'] . '.png';
            if (file_exists($qrPath)) {
                $qrData = base64_encode(file_get_contents($qrPath));
                echo '<img src="data:image/png;base64,' . $qrData . '" alt="Kode QR">';
                echo '<div class="qr-text">' . $peserta['kode_qr'] . '</div>';
            } else {
                echo '<p><strong>Kode QR belum tersedia</strong></p>';
            }
            ?>
        </div>

        <div class="nama-peserta"><?= $peserta['nama_peserta']; ?></div>
        <hr>
        <div class="info"><span class="label">Kode Unik Peserta:</span> <strong class="highlight"><?= $peserta['nomor_peserta']; ?></strong></div>
        <div class="info"><span class="label">NIK:</span> <?= $peserta['nik']; ?></div>
        <div class="info"><span class="label">Alamat:</span> <?= $peserta['alamat']; ?></div>
        <div class="info"><span class="label">Ukuran Baju:</span> <?= $peserta['ukuran_baju']; ?></div>
        <div class="info"><span class="label">Riwayat Penyakit:</span> <?= $peserta['riwayat_penyakit']; ?></div>

        <div class="note">
            Harap membawa tiket ini saat pengambilan nomor dan baju peserta.
        </div>

        <div class="footer">
            Sangatta Festival Run 2025 - All Rights Reserved
        </div>
    </div>
</body>
</html>
