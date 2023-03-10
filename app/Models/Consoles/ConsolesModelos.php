<?php

namespace App\Models\Consoles;

use CodeIgniter\Model;

class ConsolesModelos extends Model
{
    protected $table = 'consoles';
    protected $primaryKey = 'id_console';

    protected $allowedFields = [
        'id_console',
        'nome_console',
        'resumo',
        'ano_lancamento',
        'cpu',
        'memoria',
        'graficos'
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
            echo( $th->getMessage());
            exit;
        }
    }

    public function get_one($id)
    {
        try {
            $this->where($this->primaryKey,$id);
            $query=$this->first();
            return $query;
        } catch (\Throwable $th) {
            echo( $th->getMessage());
            exit;
        }
    }

    public function get_all()
    {
        try {
            $query=$this->findAll();
            return $query;
        } catch (\Throwable $th) {
            echo( $th->getMessage());
            exit;
        }
    }

    public function edit_one($id,$dados)
    {
        try {

            $this->set($dados);
            $this->where($this->primaryKey, $id);
            $this->update();
        } catch (\Throwable $th) {
            echo( $th->getMessage());
            exit;
        }
    }

    public function remove_one($id)
    {
        try {
            $this->where($this->primaryKey, $id);
            $this->delete();
        } catch (\Throwable $th) {
            echo( $th->getMessage());
            exit;
        }
    }

    public function set_array($array_dados)
    {
        try {
            $this->insertBatch($array_dados);
            
            return ("ok");

        } catch (\Throwable $th) {
            echo( $th->getMessage());
            exit;
        }
    }
    
}