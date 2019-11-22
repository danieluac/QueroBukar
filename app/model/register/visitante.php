<?php
namespace app\model\register;
use app\model\model;
/**
 * Description of visitante
 *
 * @author DanielUAC
 */
class visitante extends model
{
    //put your code here
    private $usuario;
    protected $colunas =["pri_nome","ult_nome","bilhete","usuario"];
    
    public function setUsuario($user)
    {
        $this->usuario = (int) $user;
        return $this;
    }
    public function Register(array $request)
    {
        $this->Criar
                ([
                    "pri_nome" => strip_tags($request["pri_nome"]),
                    "ult_nome" => strip_tags($request["ult_nome"]),
                    "bilhete" => strip_tags($request["BI"]),
                    "usuario" => $this->usuario
                ])->inserts();
    }     
    public function getJson()
    {
       return json_encode($this->selects()); 
    }

}
