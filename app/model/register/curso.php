<?php
namespace app\model\register;
use app\model\model;

class curso extends model
{
  protected $colunas = ["nome"];

  public function getJson()
  {
    return json_encode($this->selects());
  }
}
