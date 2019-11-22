<?php
namespace app\model\biblioteca;
use app\model\model;

class solicitacaoExterna extends model
{
  private $urlFoto;
  protected $colunas =
            [
              "idusuario",
              "idvisitante",
              "pri_nome",
              "ult_nome",
              "bilhete",
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
