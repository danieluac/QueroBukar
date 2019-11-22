<?php
namespace app\model\forum;
use app\model\model;
/**
 * Description of comentario
 *
 * @author DanielUAC
 */
class vercomentario extends model {
    //put your code here
    protected $colunas=["descricao","data","idforum","idusuario","pri_nome","ult_nome","processo","foto"];
    
    public function getJson()
    {
        return json_encode($this->selects());
    }
}
