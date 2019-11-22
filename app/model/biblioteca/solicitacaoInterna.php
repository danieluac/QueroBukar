<?php
namespace app\model\biblioteca;
use app\model\model;

class solicitacaoInterna extends model
{
  private $urlFoto;
  protected $colunas =
            [
              "idusuario",
              "idaluno",
              "pri_nome",
              "ult_nome",
              "processo",
              "curso",
              "data_solicitado",
              "chavesolicitacao",
              "quantidade",
              "idlivro",
              "livro","precolivro","idpreco"
            ];
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
