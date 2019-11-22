<?php
namespace app\model\biblioteca;
use app\model\model;

class editora extends model
{
  protected $colunas = ["nome"];
  
  public function Register()
  {
    if(isset($_POST["nomeeditora"]))
    {
      $this->nome = (string) $_POST["nomeeditora"];
      $this->inserts();
    }
      return $this;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
