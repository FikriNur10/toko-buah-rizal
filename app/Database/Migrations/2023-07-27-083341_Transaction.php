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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'produk_code' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'total' => [
                'type' => 'INT',
                'contraints' => 10
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
            $this->forge->addKey('id');
            $this->forge->createTable('transaction');
    }

    public function down()
    {
        $this->forge->dropTable('transaction');
    
    }
}
