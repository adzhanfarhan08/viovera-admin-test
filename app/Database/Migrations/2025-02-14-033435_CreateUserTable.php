<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'         => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'password'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'role'          => ['type' => 'ENUM("admin", "user")', 'default' => 'user'],
            'job'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'department'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'salary'        => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
