<?php
namespace app\model\forum;
use app\model\model;
/**
 * Description of comentario
 *
 * @author DanielUAC
 */
class verforum extends model {
    //put your code here
    protected $colunas=["titulo","descricao","data","idcategoria","idusuario","pri_nome","ult_nome","processo","foto","categoria","fotoForum"];
    
    public function getJson()
    {
        return json_encode($this->selects());
    }
}
