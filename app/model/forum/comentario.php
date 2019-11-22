<?php
namespace app\model\forum;
use app\model\model;
/**
 * Description of comentario
 *
 * @author DanielUAC
 */
class comentario extends model {
    //put your code here
    protected $colunas=["descricao","data","forum","usuario"];
    
    public function Register(array $request)
    {
        $this->Criar
                ([
                    "descricao" => strip_tags($request["comentario"]),
                    "forum" => strip_tags($request["idforum"]),
                    "usuario" => strip_tags($request["idusuario"])
                ])->inserts();
        return $this;
    }
    public function getJson()
    {
        return json_encode($this->selects());
    }
}
