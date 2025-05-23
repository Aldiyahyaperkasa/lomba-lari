<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Peserta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .ticket {
            width: 800px;
            margin: 40px auto;
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
            margin: 0;
            font-size: 28px;
            color: #d32f2f;
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
            position: absolute;
            bottom: 30px;
            right: 30px;
            text-align: center;
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
            <div class="info"><span class="label">Status Pendaftaran:</span> <span class="highlight"><?= $peserta['status_pendaftaran']; ?></span></div>
            <div class="info"><span class="label">Nomor Peserta:</span> <strong><?= $peserta['nomor_peserta']; ?></strong></div>
            <div class="info"><span class="label">Nama Peserta:</span> <?= $peserta['nama_peserta']; ?></div>
            <div class="info"><span class="label">Ukuran Baju:</span> <?= $peserta['ukuran_baju']; ?></div>
            <div class="info"><span class="label">NIK:</span> <?= $peserta['nik']; ?></div>
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

        <div class="note">
            Harap membawa tiket ini saat pengambilan nomor dan baju peserta.
        </div>
    </div>
</body>
</html>
