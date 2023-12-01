<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Set timezone to Jakarta
        date_default_timezone_set('Asia/Jakarta');
        $faker = Factory::create(); // Corrected the instantiation of the Faker instance

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'name_category' => $faker->word($gender = null),
                'created_at' => date('Y-m-d H:i:s'), // Set created_at to current date and time
                'updated_at' => date('Y-m-d H:i:s'), // Set updated_at to current date and time
            ];

            // Using Query Builder
            $this->db->table('categories')->insert($data);
        }
    }
}
