<?php

namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of viewlivroleiturainterna
 *
 * @author DanielUAC
 */
class viewlivroleituraexterna extends model
{
    //put your code here
protected $colunas =
    [
        "data_lida","hora_lida","estado","pri_nome_funcionario","ult_nome_funcionario","livro","bilhete_visitante",
        "pri_nome_visitante","ult_nome_visitante","obs","data_devolvida","hora_devolvida","idlivro"
    ];
    public function getJson()
    {
        return json_encode($this->selects());
    }

}
