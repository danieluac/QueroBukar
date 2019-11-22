<?php
namespace app\model\biblioteca;
use app\model\model;
class autor extends model
{
  protected $colunas = ["nome"];
  
  public function Register()
  {
    if(isset($_POST["nomeautor"]))
    {
      $this->nome = (string) $_POST["nomeautor"];
      $this->inserts();
    }
      return $this;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
