<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'trans_code' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true,
            ],
            'trans_customer' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'trans_product' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'trans_qty' => [
                'type' => 'INT',
                'contraints' => 10
            ],
            'trans_total' => [
                'type' => 'INT',
                'contraints' => 100
            ],
            'trans_method' => [
                'type' => 'ENUM',
                'constraint' => ['transfer', 'cash'],
                'default' => 'transfer',
            ],
            'trans_status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'success', 'failed'],
                'default' => 'pending',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('transaction');
    }

    public function down()
    {
        $this->forge->dropTable('transaction');
    
    }
}
