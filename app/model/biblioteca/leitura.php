<?php
namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of leitura
 *
 * @author DanielUAC
 */
class leitura extends model
{
    protected $colunas = ["data_lida","hora_lida","data_devolvida","hora_devolvida","estado","obs","solicitacao","funcionario"];
    public function Register()
    {
       date_default_timezone_set('Africa/Luanda');
        $this->Criar
                ([
                    "data_lida" => date("Y-m-d"),
                    "hora_lida" => date("H:i:s"),
                    "estado" => "OCUPADO",
                    "solicitacao" => strip_tags($_POST["idsolicitacao"]),
                    "funcionario" => $_SESSION["FuncionarioId"]
                ])->inserts();
                
    }
    public function UpdateRegister()
    {
       date_default_timezone_set('Africa/Luanda');       
       {
           $this->Criar
                    ([
                        "data_devolvida" => date("Y-m-d"),
                        "hora_devolvida" => date("H:i:s"),
                        "estado" => strip_tags($_POST["estado"]),
                        "obs" => strip_tags($_POST["obs"])
                    ])->updates();
       }
    }
    public function getJson()
    {
        
    }

}
