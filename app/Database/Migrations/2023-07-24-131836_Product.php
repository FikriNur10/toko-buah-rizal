<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'BIGINT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'product_code' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_price' => [
                'type' => 'INT',
                'constraint' => '12',
            ],
            'product_description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'product_stock' => [
                'type' => 'INT',
                'constraint' => '12',
            ],
            'product_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('product_code');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
