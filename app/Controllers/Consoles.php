<?php

namespace App\Controllers;

use App\Models\Consoles\ConsolesModelos;

class Consoles extends BaseController
{
    private $model_consoles;
    public function __construct()
    {
        $this->model_consoles = new ConsolesModelos();
    }

    public function povoarBancoCrawler()
    {
        $link = 'https://bdjogos.com.br/consoles.php';
        $html = file_get_contents($link);
        $array_names = [];

        preg_match_all('/<div>(.*?)<\/div>/', $html, $list);


        foreach ($list[1] as $key => $html) {
            preg_match_all('/\'>(.*?)<\/a>/', $html, $name);
            $array_names[$key]['nome_console'] = $name[1][0];
        }
        $this->model_consoles->set_array($array_names);
        return $array_names;
    }

    ///CRUD
    public function novo_console()
    {
        $dados = $this->request->getVar();
        $dados= (array) $dados;
        if (!isset($dados["nome_console"]) || !isset($dados["ano_lancamento"])) {
            $error = ['message' => "preencha no minimo o nome e a data de lançamento"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $id=$this->model_consoles->set_one($dados);
        $success = ['message' => "Tudo certo o id salvo é $id"];
        $this->response->setStatusCode(200);
        return json_encode($success);
    }
    public function visualizar_console($id)
    {
        $id=$this->model_consoles->get_one($id);
        if (is_null($id) || empty($id) ) {
            $error = ['message' => "Não a esse id no banco"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $this->response->setStatusCode(200);
        return json_encode($id);
    }
    public function visualizar_todos_console()
    {
        $ids=$this->model_consoles->get_all();
        if (is_null($ids) || empty($ids) ) {
            $error = ['message' => "Não a nada aqui."];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }
        $this->response->setStatusCode(200);
        return json_encode($ids);
    }
    public function editar_console($id)
    {
        $dados = $this->request->getVar();
        $dados= (array) $dados;

        if (!isset($dados["nome_console"]) || !isset($dados["ano_lancamento"])) {
            $error = ['message' => "preencha no minimo o nome e a data de lançamento"];
            $this->response->setStatusCode(400);
            return json_encode($error);
        }

        $id=$this->model_consoles->edit_one($id,$dados);

        $success = ['message' => "Tudo certo o id $id foi alterado"];
        $this->response->setStatusCode(200);
        return json_encode($success);
    }
    public function deletar_console($id)
    {
        $id=$this->model_consoles->remove_one($id);
        $success = ['message' => "Tudo certo o id foi removido"];
        $this->response->setStatusCode(200);
        return json_encode($success);

    }
}
