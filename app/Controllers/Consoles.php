<?php

namespace App\Controllers;

use App\Models\Consoles\ConsolesModelos;

class Consoles extends BaseController
{
    private $model_consoles;
    public function __construct()
    {
        $this->model_consoles= new ConsolesModelos();
    }
    public function povoarBancoCrawler()
    {
        $link='https://bdjogos.com.br/consoles.php';
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
}

