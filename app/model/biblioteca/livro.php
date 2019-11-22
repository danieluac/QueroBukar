<?php
namespace app\model\biblioteca;
use app\model\model;

class livro extends model
{
  private $urlFoto;
  protected $colunas =
            [
              "titulo",
              "lancamento",
              "quantidade",
              "edicao",
              "categoria",
              "editora",
              "preco",
              "processo",
              "prefacio",
              "foto",
              "isbn",
              "data"
            ];

  public function setUrlFoto($url)
  {
    $this->urlFoto = $url;
    return $this;
  }
  public function Register()
  {
      $this->Criar(
      [
        "titulo"=>strip_tags($_POST["titulo"]),
        "lancamento"=>strip_tags($_POST["ano"]),
        "quantidade"=>strip_tags($_POST["quantidade"]),
        "edicao"=>strip_tags($_POST["edicao"]),
        "categoria"=>strip_tags($_POST["categoria"]),
        "editora"=>strip_tags($_POST["editora"]),
        "preco" =>strip_tags($_POST["preco"]),
        "processo"=>strip_tags($_POST["codigo"]),
        "prefacio" =>strip_tags($_POST["prefacio"]),
        "foto"=>$this->urlFoto,
        "isbn" =>strip_tags($_POST["isbn"]),
        "data" => date("Y-m-d")
      ]);
      $this->inserts();
      return $this;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
