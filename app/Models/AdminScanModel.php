<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminScanModel extends Model
{
    protected $table = 'admin_scan';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password', 'nama'];
}
