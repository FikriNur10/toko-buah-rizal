<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Product extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $name = substr($faker->name, 0, 50);
        $price = substr($faker->numberBetween(1, 2000), 0, 100);
        $expiried_date = substr($faker->date, 0, 100);
        $stock = substr($faker->numberBetween(1, 2000), 0, 12);
        $deskripsi = substr($faker->text, 0, 255);

        for ($i = 0; $i < 10; $i++) {
            $uniqueIdentifier = $i;
            $produk_code = "produk{$uniqueIdentifier}";
            $data_product = [
                'produk_code' => $produk_code,
                'name' => $name,
                'price' => $price,
                'expiried_date' => $expiried_date,
                'stock' => $stock,
                'image' => 'dummy.jpg',
                'deskripsi' => $deskripsi,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
            $this->db->table('produk')->insert($data_product);
        }
    }
}
