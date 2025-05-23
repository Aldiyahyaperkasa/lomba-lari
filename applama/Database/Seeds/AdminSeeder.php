<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin1',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'nama'     => 'Administrator Satu',
            ],
            [
                'username' => 'admin2',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'nama'     => 'Administrator Dua',
            ],
            [
                'username' => 'admin3',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'nama'     => 'Administrator Tiga',
            ],
        ];

        // Insert batch ke tabel admin
        $this->db->table('admin')->insertBatch($data);
    }
}
