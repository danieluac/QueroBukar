<?php
namespace app\model\login;
use app\model\model;


class usuario extends model
{
  private $usuario,$senha;
  protected $colunas = ["nome","senha","perfil","estado","foto"];

  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
    return $this;
  }
  public function setSenha ($senha)
  {
    $this->senha = md5($senha);
    return $this;
  }
  public function getUsuario()
  {
    return $this->usuario;
  }
  public function getSenha()
  {
    return $this->senha;
  }
  public function RegisterEmployee(array $request)
  {
    $this->Criar
      ([
        "nome"=>$request["processo"],
        "senha"=>md5($request["password"]),
        "perfil"=>"FUNCIONARIO",
        "estado"=>"ACTIVO"
      ]);
     if($this->inserts())
        return $this->where("nome","=",$request["processo"])->selects();
     else return false;
  }
  public function RegisterStudant(array $request)
  {
    $this->Criar
      ([
        "nome"=> (int) $request["processo"],
        "senha"=>md5($request["password"]),
        "perfil"=>"ALUNO",
        "estado"=>"PENDENTE"
      ]);
    if($this->inserts())
        return $this->where("nome","=",$request["processo"])->selects();
     else return false;
  }
  public function RegisterVisitante(array $request)
  {
    $this->Criar
      ([
        "nome"=> (int) $request["BI"],
        "senha"=>md5($request["BI"]),
        "perfil"=>"VISITANTE",
        "estado"=>"PENDENTE"
      ]);
    if($this->inserts())
        return $this->where("nome","=",$request["BI"])->selects();
     else return false;
  }
  public function getStart()
  {
    $user = $this->where("nome","=",$this->getUsuario(),"and")
            ->where("senha","=",$this->getSenha(),"and")
            ->where("estado","=","ACTIVO")
            ->selects();
            if(!empty($user))
            {
                setcookie
                (
                  "QBukarPHP7",
                  base64_encode(base64_encode(base64_encode($user[0]->perfil))),
                  mktime(1,1,1,1,1,2090)
                );
                $_SESSION["UserName"] =$user[0]->nome;
                $_SESSION["UserId"] =$user[0]->id;
                $_SESSION["UserPerfil"] = $user[0]->perfil;
                return 1;
            }else return false;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }

}
