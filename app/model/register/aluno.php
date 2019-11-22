<?php
namespace app\model\register;
use app\model\model;

class aluno extends model
{
  private $idusuario;
  protected $colunas =
            [
              "pri_nome",
              "ult_nome",
              "processo",
              "curso",
              "sexo",
              "usuario"
            ];
  public function setUsuario ($usuario)
  {
    $this->idusuario =(int) $usuario;
    return $this;
  }
  public function Register(array $post)
  {
    $this->Criar
    ([
      "pri_nome"=>$post["primeiroNome"],
      "ult_nome"=>$post["sobrenome"],
      "processo"=>$post["processo"],
      "sexo"=>$post["sexo"],
      "curso"=>$post["curso"],
      "usuario"=>$this->idusuario
    ]);
    if($this->inserts())
      return true;
    else return false;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
