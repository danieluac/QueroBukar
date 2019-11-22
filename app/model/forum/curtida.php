<?php

namespace app\model\forum;
use app\model\model;
/**
 * Description of curtida
 *
 * @author DanielUAC
 */
class curtida extends model {
    //put your code here
    protected $colunas = ["gosto","forum","usuario"];
    
     public function Register(array $request)
    {
        $this->Criar
                ([
                    "gosto" => strip_tags($request["gosto"]),
                    "forum" => strip_tags($request["forum"]),
                    "usuario" => strip_tags($request["usuario"])
                ]);
    }
    public function getJson()
    {
        return json_encode($this->selects());
    }
}
