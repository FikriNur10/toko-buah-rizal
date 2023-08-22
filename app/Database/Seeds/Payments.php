<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PaymentsSeeder extends Seeder
{
    public function run()
    {
        $paymentsModel = model('PaymentsModel');

        for ($i = 1; $i <= 100; $i++) {
            $data_payments = [
                'id_user' => $i,  // Assuming each user has a unique ID
                'id_product' => $i, // Assuming each product has a unique ID
                'id_transaction' => $i, // Assuming each transaction has a unique ID
                'status' => '1',
                'total' => '100000',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];

            $paymentsModel->insert($data_payments);
        }
    }
}
