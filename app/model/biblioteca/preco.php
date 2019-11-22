<?php
namespace app\model\biblioteca;
use app\model\model;

class preco extends model
{
  protected $colunas = ["nome"];
  
  public function Register()
  {
    if(isset($_POST["preco"]) and $_POST["preco"]!=="" && $_POST["preco"]!==" ")
    {
      $this->nome = (string) $_POST["preco"];
      $this->inserts();
    }
      return $this;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
