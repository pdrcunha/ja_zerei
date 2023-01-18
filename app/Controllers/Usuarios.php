<?php

namespace App\Controllers;

use App\Models\Usuarios\UsuariosModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;


class Usuarios extends ResourceController
{
    private $user_model;
    private $key;

    public function __construct()
    {
        $this->user_model=new UsuariosModel();
        
        $this->key = getenv('TOKEN_SECRET');
    }

    public function novo_usuario()
    {
        $dados = $this->request->getVar();
        $dados= (array) $dados;
        if (!isset($dados["login"]) || !isset($dados["pass"]) || !isset($dados["name"]) || !isset($dados["email"])) {
            $error = ['message' => "preencha nome,email,pass e login"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $dados['pass']=password_hash($dados['pass'], PASSWORD_BCRYPT);
        $id=$this->user_model->set_one($dados);
        $success = ['message' => "Tudo certo o id salvo é $id"];
        $this->response->setStatusCode(200);
        return json_encode($success);
        
    }
    public function login()
    {
        $dados = $this->request->getVar();
        $dados= (array) $dados;
        if (!isset($dados["login"]) || !isset($dados["pass"])) {
            $error = ['message' => "preencha login e pass"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }

        $user=$this->user_model->user_by_login($dados['login']);
        
        $verify = password_verify($dados["pass"], $user['pass']);
        if(!$verify) return $this->fail('erro de credenciais ');
         $payload = array(
            "iat" => 1356999524,
            // "nbf" => 1357000000,
            "uid" => $user['id_user'],
            "email" => $user['email']
        );
        
        $token = JWT::encode($payload, $this->key,'HS256');
        $success = ['message' => "Logado com sucesso"];
        $this->response->setStatusCode(200);
        return $this->respond($token);
        return json_encode($success);

    }

    public function user_in_token()
    {
        
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];
        
        try {
            $decoded = JWT::decode($token, $this->key, 'HS256');
            $response = [
                'id_user' => $decoded->uid,
                'email' => $decoded->email
            ];
            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }

    public function delete_user($id = null)
    {
        $id=$this->user_model->remove_one($id);
        $success = ['message' => "Tudo certo o id foi removido"];
        $this->response->setStatusCode(200);
        return json_encode($success);
    }
}
