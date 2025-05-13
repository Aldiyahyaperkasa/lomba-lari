<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'panitia1SFR2025',
                'password' => password_hash('adminSFRsuccess', PASSWORD_DEFAULT),
                'nama'     => 'Administrator Satu',
            ],
            [
                'username' => 'panitia2SFR2025',
                'password' => password_hash('adminSFRsuccess', PASSWORD_DEFAULT),
                'nama'     => 'Administrator Dua',
            ],
            [
                'username' => 'panitia3SFR2025',
                'password' => password_hash('adminSFRsuccess', PASSWORD_DEFAULT),
                'nama'     => 'Administrator Tiga',
            ],
        ];

        // Insert batch ke tabel admin
        $this->db->table('admin')->insertBatch($data);
    }
}
