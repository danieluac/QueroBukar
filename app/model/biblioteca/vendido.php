<?php
namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of vendido
 *
 * @author DanielUAC
 */
class vendido extends model
{
    protected $colunas =["data_vendido","hora_vendido","quantidade_vendido","solicitacao","funcionario"];
    
    public function Register()
    {
        date_default_timezone_set('Africa/Luanda');
        $this->Criar
                ([
                   "data_vendido" => date("Y-m-d"),
                   "hora_vendido" => date("H:i:s"),
                   "quantidade_vendido" => strip_tags($_POST["quantidade"]),
                   "solicitacao" => strip_tags($_POST["idsolicitacao"]),
                   "funcionario" => $_SESSION["FuncionarioId"]
                ])->inserts();
    }
    public function getJson() {
        
    }

}
