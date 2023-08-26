<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder as CSeeder;

class Seeder extends CSeeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('CategoriesSeeder');
        $this->call('BlogSeeder');
    }
}
