<?php

namespace App\Libraries;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeHelper
{
public static function generate($kodeQR, $filename)
    {
        $qrCode = new QrCode($kodeQR);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Simpan ke folder public/qrcodes/
        $path = FCPATH . 'qrcodes/' . $filename;
        file_put_contents($path, $result->getString());

        return 'qrcodes/' . $filename; // Kembalikan relative path (tanpa 'public/')
    }


}
