<?php

namespace App\Models\Consoles;

use CodeIgniter\Model;

class JaZerei extends Model
{
    protected $table = 'jogos_ja_zerei';
    protected $primaryKey = 'id_ja_zerei';

    protected $allowedFields = [
        'fk_console',
        'horas',
        'nota_jogabilidade',
        'nota_historia',
        'nota_visual',
        'nota_diversão',
        'obs'
    ];



    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function set_one($dados)
    {
        try {
            $this->set($dados);
            $this->insert($dados);
            $id = $this->insertID();
            return $id;
        } catch (\Throwable $th) {
            return( $th->getMessage());
        }
    }

    public function get_one($id)
    {
        try {
            $this->where($this->primaryKey,$id);
            $query=$this->first();
            return $query;
        } catch (\Throwable $th) {
            return( $th->getMessage());
        }
    }

    public function get_all()
    {
        try {
            $query=$this->findAll();
            return $query;
        } catch (\Throwable $th) {
            return( $th->getMessage());
        }
    }

    public function edit_one($id,$dados)
    {
        try {
            $this->set($dados);
            $this->where($this->primaryKey, $id);
            $this->update($dados);
        } catch (\Throwable $th) {
            return( $th->getMessage());
        }
    }

    public function remove_one($id)
    {
        try {
            $this->where($this->primaryKey, $id);
            $this->delete();
        } catch (\Throwable $th) {
            return( $th->getMessage());
        }
    }
}