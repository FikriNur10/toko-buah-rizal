<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data_admin = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'address' => 'admin',
            'phone' => '123456789',
            'password' => password_hash('admin1234', PASSWORD_DEFAULT),
            'role' => 'admin',
        ];
        $this->db->table('users')->insert($data_admin);
    }
}
