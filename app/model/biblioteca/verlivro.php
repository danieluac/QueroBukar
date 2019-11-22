<?php
namespace app\model\biblioteca;
use app\model\model;

class verlivro extends model
{
  protected $colunas =
            [
              "titulo",
              "ano",
              "quantidade",
              "edicao",
              "categoria",
              "editora",
              "preco",
              "processo",
              "prefacio",
              "isbn",
              "idpreco",
              "idcategoria",
              "data"
            ];
  public function getJson()
  {
    return json_encode($this->selects());
  }
  
}
