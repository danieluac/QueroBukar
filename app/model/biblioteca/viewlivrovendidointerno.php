<?php

namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of viewlivroleiturainterna
 *
 * @author DanielUAC
 */
class viewlivrovendidointerno extends model
{
    //put your code here
protected $colunas =
    [
        "data_vendido","hora_vendido","quantidade_vendido","pri_nome_funcionario","ult_nome_funcionario","livro","processo_aluno",
        "pri_nome_aluno","ult_nome_aluno","numero_agente","idfuncionario",
        "idsolicitacao","preco_livro","curso","idlivro"
    ];
    public function getJson()
    {
        return json_encode($this->selects());
    }

}
