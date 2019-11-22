<?php
namespace app\model\register;
use app\model\model;
/**
 * Description of funcionario
 *
 * @author DanielUAC
 */
class funcionario extends model
{
    //put your code here
    protected $colunas =["pri_nome","ult_nome","numero_agente","usuario"];
    
    public function Register()
    {
        $this->Criar
                ([
                    "pri_nome" => "",
                    "ult_nome" => "",
                    "numero_agente" => "",
                    "usuario" => ""
                ])->inserts();
    }

    public function getJson() {
        
    }

}
