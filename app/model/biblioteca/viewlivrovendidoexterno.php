<?php

namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of viewlivroleiturainterna
 *
 * @author DanielUAC
 */
class viewlivrovendidoexterno extends model
{
    //put your code here
protected $colunas =
    [
        "data_vendido","hora_vendido","quantidade_vendido","pri_nome_funcionario","ult_nome_funcionario","livro","bilhete_visitante",
        "pri_nome_visitante","ult_nome_visitante","numero_agente","idfuncionario","idsolicitacao","preco_livro","idlivro"
    ];
    public function getJson()
    {
        return json_encode($this->selects());
    }

}
