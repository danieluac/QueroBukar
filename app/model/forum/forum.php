<?php
namespace app\model\forum;
use app\model\model;
/**
 * Description of forum
 *
 * @author DanielUAC
 */
class forum extends model
{
    protected $UrlFoto, $colunas = ["titulo","descricao","usuario","categoria","data","foto"];
    //put your code here
    public function setUrlFoto($url)
    {
        $this->UrlFoto = (string) $url;
        return $this;
    }
    public function Register(array $request)
    {
        $this->Criar
                ([
                   "titulo"=> strip_tags($request["titulo"]),
                   "descricao"=> strip_tags($request["descricao"]),
                   "usuario"=>$request["idusuario"],
                   "categoria"=>$request["idcategoria"],
                   "foto"=>$this->UrlFoto
                ])->inserts();
    }
    public function getJson()
    {
        return json_encode($this->selects());
    }
}
