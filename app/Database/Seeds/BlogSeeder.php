<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Teknologi Informasi',
                'slug' => 'teknologi-informasi',
                'description' => 'Teknologi Informasi adalah',
                'thumbnail' => 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.maxmanroe.com%2Fvid%2Fwp-content%2Fuploads%2F2017%2F12%2FPengertian-Teknologi-Informasi-dan-Komunikasi.jpg&tbnid=EVTy6ipJJdvtLM&vet=12ahUKEwiE3aTKuPmAAxUs6DgGHSE_A3cQMygAegQIARBT..i&imgrefurl=https%3A%2F%2Fwww.maxmanroe.com%2Fvid%2Fteknologi%2Fteknologi-informasi.html&docid=YPTPrUudGCL95M&w=700&h=368&q=teknologi%20informasi&ved=2ahUKEwiE3aTKuPmAAxUs6DgGHSE_A3cQMygAegQIARBT',
                'categories_id' => '1',
                'author_id' => '1',
                'status' => 'published',
            ],
            [
                'title' => 'Sistem Informasi',
                'slug' => 'sistem-informasi',
                'description' => 'sistem Informasi adalah',
                'thumbnail' => 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.maxmanroe.com%2Fvid%2Fwp-content%2Fuploads%2F2017%2F12%2FPengertian-Teknologi-Informasi-dan-Komunikasi.jpg&tbnid=EVTy6ipJJdvtLM&vet=12ahUKEwiE3aTKuPmAAxUs6DgGHSE_A3cQMygAegQIARBT..i&imgrefurl=https%3A%2F%2Fwww.maxmanroe.com%2Fvid%2Fteknologi%2Fteknologi-informasi.html&docid=YPTPrUudGCL95M&w=700&h=368&q=teknologi%20informasi&ved=2ahUKEwiE3aTKuPmAAxUs6DgGHSE_A3cQMygAegQIARBT',
                'categories_id' => '1',
                'author_id' => '1',
                'status' => 'published',
            ]
        ];
        $this->db->table('blogs')->insertBatch($data);
    }
}
