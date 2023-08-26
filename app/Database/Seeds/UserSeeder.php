<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => password_hash('user', PASSWORD_DEFAULT),
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
