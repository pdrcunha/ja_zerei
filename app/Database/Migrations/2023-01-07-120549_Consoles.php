<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Consoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_console'	=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome_console'	=> ['type' => 'varchar', 'constraint' => 128,'null' => true],
            'resumo'	=> ['type' => 'varchar', 'constraint' => 500,'null' => true],
            'ano_lancamento'	=> ['type' => 'int', 'constraint' => 11,'null' => true],
            'cpu'	=> ['type' => 'varchar', 'constraint' => 300,'null' => true],
            'memoria'	=> ['type' => 'varchar', 'constraint' => 300,'null' => true],
            'graficos'	=> ['type' => 'varchar', 'constraint' => 300, 'null' => true],
            'created_at'	=> ['type' => 'datetime', 'null' => true],
            'updated_at'	=> ['type' => 'datetime', 'null' => true],
            'deleted_at'	=> ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_console', true);
        $this->forge->createTable('consoles', true);
    }

    public function down()
    {
        $this->forge->dropTable('consoles', true);
    }
}
