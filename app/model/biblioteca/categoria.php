<?php
namespace app\model\biblioteca;
use app\model\model;

class categoria extends model
{
  protected $colunas = ["nome","tipo"];
  
  public function Register()
  {
    if(isset($_POST["nomecategoria"]))
    {
      $this->nome = (string) $_POST["nomecategoria"];
      $this->tipo = "Livro";
      $this->inserts();
    }
      return $this;
  }
  public function RegisterForum()
  {
    if(isset($_POST["nomecategoria"]))
    {
      $this->nome = (string) $_POST["nomecategoria"];
      $this->tipo = "Forum";
      $this->inserts();
    }
      return $this->where("nome","=",$_POST["nomecategoria"],"AND")->where("tipo","=","Forum")->selects()[0]->id;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
