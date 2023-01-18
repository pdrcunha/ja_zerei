<?php

namespace App\Models\Usuarios;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'login',
        'name',
        'email',
        'pass'
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
    public function user_by_login($login)
    {
        try {
            $this->where('login',$login);
            $query= $this->first();
            return $query;
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
}