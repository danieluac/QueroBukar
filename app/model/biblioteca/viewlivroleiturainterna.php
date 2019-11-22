<?php

namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of viewlivroleiturainterna
 *
 * @author DanielUAC
 */
class viewlivroleiturainterna extends model
{
    //put your code here
protected $colunas =
    [
        "data_lida","hora_lida","estado","pri_nome_funcionario","ult_nome_funcionario","livro","processo_aluno",
        "pri_nome_aluno","ult_nome_aluno","curso","data_devolvida","hora_devolvida","obs","idlivro"
    ];
    public function getJson()
    {
        return json_encode($this->selects());
    }

}
