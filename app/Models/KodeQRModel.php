<?php

namespace App\Models;

use CodeIgniter\Model;

class KodeQRModel extends Model
{
    protected $table            = 'kode_qr';
    protected $primaryKey       = 'id_qr';
    protected $allowedFields    = [
        'id_peserta',
        'kode_qr',
        'qr_code_path',
        'status_pengambilan',
        'waktu_generate'
    ];

    protected $useTimestamps    = false; // karena kita pakai timestamp manual
    protected $returnType       = 'array';
}
