<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersAdmSeeds extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'login' => "admin",
            'pass' => '$2y$10$ZP1rkLqtXSK4RmOXXd4TnulIMjod6NdX0QK/DALkS7TXXqns7I/Uy',
            'name' => "ADMIN",
            'email'=>"admo@adm.adm.br"
        ]);
    }
}