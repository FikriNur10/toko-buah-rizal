<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Cart extends Seeder
{
    public function run()
    {
        $cart_test = [
            'user_id' => 2,
            'product_code' => 'MAG001',
            'cart_qty' => 5,
        ];
        $this->db->table('cart')->insert($cart_test);
        
    }
}
