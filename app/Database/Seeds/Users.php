<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Users extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();


        $name = substr($faker->name, 0, 50);
        $address = substr($faker->address, 0, 255);
        $kodepos = $faker->numberBetween(1, 2000);
        $negara = $faker->randomElement(['Indonesia', 'Malaysia', 'Singapura', 'Thailand', 'Filipina', 'Vietnam', 'Laos', 'Myanmar', 'Brunei Darussalam']);
        $kota = substr($faker->city, 0, 50);
        $provinsi = substr($faker->state, 0, 50);
        $phone = substr($faker->phoneNumber, 0, 12);
        $password = substr($faker->password, 0, 255);


        for ($i = 0; $i < 100; $i++) {
            $uniqueIdentifier = $i; // Variabel iterasi dapat digunakan sebagai penanda unik
            $email = "user{$uniqueIdentifier}@example.com";
            $data_user = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'negara' => $negara,
                'kodepos' => $kodepos,
                'provinsi' => $provinsi,
                'kota' => $kota,
                'phone' => $phone,
                'role' => 'user',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
            $this->db->table('users')->insert($data_user);
        }
    }
}
