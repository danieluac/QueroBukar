<?php

namespace app\model\biblioteca;
use app\model\model;
/**
 * Description of solicitacao
 *
 * @author DanielUAC
 */
class solicitacao extends model
{
    //put your code here
    private $usuario;
    protected $colunas =
            [
              "usuario",
              "quantidade",
              "data_solicitado",
              "livro",
              "estado"
            ];
    public function Register(array $request)
    {
        $this->Criar
                ([
                    "usuario" => strip_tags($request["idusuario"]),
                    "livro" => strip_tags($request["LivroID"]),
                    "data_solicitado" => date("Y-m-d"),
                    "quantidade" => strip_tags($request["quantidade"]),
                    "estado" => "PENDENTE"
                ])->inserts();
        return $this->where("usuario","=",strip_tags($request["idusuario"]))
                ->where("livro","=",strip_tags($request["LivroID"]),"AND")
                ->setOrderBy("ORDER BY id DESC")->selects()[0]->id;
    }

    public function setUsuario($user)
    {
        $this->usuario = (int) $user;
        return $this;
    }
    public function RegisterExtern(array $request)
    {
        $this->Criar
                ([
                    "usuario" => $this->usuario,
                    "livro" => strip_tags($request["LivroID"]),
                    "data_solicitado" => date("Y-m-d"),
                    "quantidade" => strip_tags($request["quantidade"]),
                    "estado" => "PENDENTE"
                ])->inserts();
        return $this->where("usuario","=",$this->usuario)
                ->where("livro","=",strip_tags($request["LivroID"]),"AND")
                ->setOrderBy("ORDER BY id DESC")->selects()[0]->id;
    }
    public function getJson()
    {

    }

}
