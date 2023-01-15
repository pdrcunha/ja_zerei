<?php

namespace App\Controllers;

use App\Models\Jogos\JaZereiModelos;

class Jogos extends BaseController
{
    private $model_jogos;
    public function __construct()
    {
        $this->model_jogos = new JaZereiModelos();
    }
    ///CRUD
    public function novo_ja_zerei()
    {
        $dados = $this->request->getVar();
        $dados = (array) $dados;
        if (!isset($dados["nome_jogo"]) || !isset($dados["fk_console"])) {
            $error = ['message' => "preencha no minimo o nome e o console"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $id = $this->model_jogos->set_one($dados);
        $success = ['message' => "Tudo certo o id salvo é $id"];
        $this->response->setStatusCode(200);
        return json_encode($success);
    }
    public function visualizar_ja_zerei($id)
    {
        $id = $this->model_jogos->get_one($id);
        if (is_null($id) || empty($id)) {
            $error = ['message' => "Não a esse id no banco"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $this->response->setStatusCode(200);
        return json_encode($id);
    }
    public function visualizar_todos_ja_zerei()
    {
        $ids = $this->model_jogos->get_all();
        if (is_null($ids) || empty($ids)) {
            $error = ['message' => "Não a nada aqui."];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $this->response->setStatusCode(200);
        return json_encode($ids);
    }
    public function editar_ja_zerei($id)
    {
        $dados = $this->request->getVar();
        $dados = (array) $dados;

        if (!isset($dados["nome_jogo"]) || !isset($dados["fk_console"])) {
            $error = ['message' => "preencha no minimo o nome e o console"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }


        $success = ['message' => "Tudo certo o id $id foi alterado"];
        $this->response->setStatusCode(200);
        return json_encode($success);
    }
    public function deletar_ja_zerei($id)
    {
        $id = $this->model_jogos->remove_one($id);
        $success = ['message' => "Tudo certo o id foi removido"];
        $this->response->setStatusCode(200);
        return json_encode($success);
    }
}
