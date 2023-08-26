<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'status' => 'published',
            ],
            [
                'name' => 'Informasi',
                'slug' => 'informasi',
                'status' => 'published',
            ]
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
