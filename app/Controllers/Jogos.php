<?php

namespace App\Controllers;



class Jogos extends BaseController
{

    ///CRUD
    public function novo_ja_zerei(){
        $dados = $this->request->getVar();
    }
    public function visualizar_ja_zerei($id){
        
    }
    public function visualizar_todos_ja_zerei(){
        
    }
    public function editar_ja_zerei($id){
        $dados = $this->request->getVar();
        
    }
    public function deletar_ja_zerei($id){
        
    }
}
