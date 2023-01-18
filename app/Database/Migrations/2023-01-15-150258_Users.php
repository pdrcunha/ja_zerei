<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'login'    => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'name'    => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'email'    => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'pass'    => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
