<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JogosJaZerei extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ja_zerei'	=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'fk_console'	=> ['type' => 'int', 'constraint' => 11,'unsigned' => true],
            // 'fk_user'	=> ['type' => 'int', 'constraint' => 11],
            'horas'	=>          ['type' => 'int', 'constraint' => 11,'null' => true],
            'nota_jogabilidade'	=> ['type' => 'int', 'constraint' => 11,'null' => true],
            'nota_historia'	=> ['type' => 'int', 'constraint' => 11],
            'nota_visual'	=> ['type' => 'int', 'constraint' => 11],
            'nota_diversão'	=> ['type' => 'int', 'constraint' => 11],
            'obs'	=> ['type' => 'varchar', 'constraint' => 500,'null' => true],
            'created_at'	=> ['type' => 'datetime', 'null' => true],
            'updated_at'	=> ['type' => 'datetime', 'null' => true],
            'deleted_at'	=> ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_ja_zerei', true);
        $this->forge->addForeignKey('fk_console', 'consoles', 'id_console');
        $this->forge->createTable('jogos_ja_zerei', true);
    }

    public function down()
    {
        $this->forge->dropTable('jogos_ja_zerei', true);
    }
}
