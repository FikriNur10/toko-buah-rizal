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
                'constraint' => '100',
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
                'constraint' => ['Indonesia', 'Malaysia', 'Singapura', 'Thailand', 'Filipina', 'Vietnam', 'Laos', 'Myanmar', 'Brunei Darussalam', 'Laos'],
                'default' => 'Indonesia',
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => '12',
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