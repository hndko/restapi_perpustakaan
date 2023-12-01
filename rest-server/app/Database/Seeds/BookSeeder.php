<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Set timezone to Jakarta
        date_default_timezone_set('Asia/Jakarta');
        $faker = Factory::create(); // Corrected the instantiation of the Faker instance

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'title' => $faker->sentence(3),
                'category_id' => $faker->randomElement(['1', '2', '3']), // Corrected to randomElement
                'author_id' => $faker->randomElement(['1', '2', '3']), // Corrected to randomElement
                'description' => $faker->paragraphs(2, true),
                'created_at' => date('Y-m-d H:i:s'), // Set created_at to current date and time
                'updated_at' => date('Y-m-d H:i:s'), // Set updated_at to current date and time
            ];

            // Using Query Builder
            $this->db->table('books')->insert($data);
        }
    }
}
