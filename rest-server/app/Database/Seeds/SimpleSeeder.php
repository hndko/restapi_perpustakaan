<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SimpleSeeder extends Seeder
{
    public function run()
    {
        $this->call('BookSeeder');
        $this->call('AuthorSeeder');
        $this->call('CategorySeeder');
    }
}
