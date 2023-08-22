<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => '255',
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kodepos' => [
                'type' => 'INT',
                'constraint' => '10',
            ],
            'negara' => [
                'type' => 'ENUM',
                'constraint' => ['Indonesia', 'Malaysia', 'Singapura', 'Thailand', 'Filipina', 'Vietnam', 'Laos', 'Myanmar', 'Brunei Darussalam'],
                'default' => 'Indonesia',
            ],
            'kota' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'provinsi' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => '14',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user',
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
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
