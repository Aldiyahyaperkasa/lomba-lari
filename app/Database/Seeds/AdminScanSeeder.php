<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminScanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'scanQRSFR1',
                'password' => password_hash('SRFscanner2025', PASSWORD_DEFAULT),
                'nama'     => 'Admin Scan Satu',
            ],
            [
                'username' => 'scanQRSFR2',
                'password' => password_hash('SRFscanner2025', PASSWORD_DEFAULT),
                'nama'     => 'Admin Scan Dua',
            ],
            [
                'username' => 'scanQRSFR3',
                'password' => password_hash('SRFscanner2025', PASSWORD_DEFAULT),
                'nama'     => 'Admin Scan Tiga',
            ],
            [
                'username' => 'scanQRSFR4',
                'password' => password_hash('SRFscanner2025', PASSWORD_DEFAULT),
                'nama'     => 'Admin Scan Tiga',
            ],
        ];

        // Insert ke tabel admin_scan
        $this->db->table('admin_scan')->insertBatch($data);
    }
}
