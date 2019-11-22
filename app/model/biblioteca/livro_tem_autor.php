<?php
namespace app\model\biblioteca;
use app\model\model;
class livro_tem_autor extends model
{
  protected $idlivro, $colunas = ["livro_id","autor_id"];

  public function __construct()
  {
    parent::get_table();
    $this->chavePrimaria="livro_id";
  }
  public function setLivro($id)
  {
    $this->idlivro = (int) $id;
    return $this;
  }
  public function Register()
  {
    for($a=0;$a<count($_POST["autor"]);$a++)
    {
      $this->Criar(
      [
        "livro_id"=>$this->idlivro,
        "autor_id"=>strip_tags($_POST["autor"][$a])
      ]);
      $this->inserts();
    }
      return $this;
  }
  public function getJson()
  {
    return json_encode($this->selects());
  }
}
