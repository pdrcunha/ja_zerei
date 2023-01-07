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


    public function get_all()
    {
        try {
            $query = $this->findAll();
            return $query;
        } catch (\Throwable $th) {
            echo( $th->getMessage());
        }
    }
    public function set_array($array_dados)
    {
        try {
            $this->insertBatch($array_dados);
            
            echo ("ok");

        } catch (\Throwable $th) {
            echo( $th->getMessage());
        }
    }
}