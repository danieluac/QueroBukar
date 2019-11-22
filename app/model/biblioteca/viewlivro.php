<?php
namespace app\model\biblioteca;
use app\model\model;

class viewlivro extends model
{
  protected $colunas =
            [
              "titulo",
              "ano",
              "quantidade",
              "edicao",
              "categoria",
              "autor",
              "editora",
              "preco",
              "processo",
              "prefacio",
              "isbn",
              "idpreco",
              "data"
            ];
  public function getJson()
  {
    return json_encode($this->selects());
  }
  public function getLivro()
  {
    $data=[];
    for($a=0;$a<count($this->selects());$a++)
    {
      $bool=false;
      for($b=0;$b<count($data);$b++)
      {
        if(isset($data[$b]) && $data[$b]["id"]==$this->selects()[$a]->id)
        {
          $data[$b]["autor"] .=", ".$this->selects()[$a]->autor;
          $bool=true;
        }
      }
      if($bool===false)
      {
        $data[]["id"] =$this->selects()[$a]->id;
        $data[count($data)-1]["titulo"] =$this->selects()[$a]->titulo;
        $data[count($data)-1]["idpreco"] =$this->selects()[$a]->idpreco;
        $data[count($data)-1]["ano"] =$this->selects()[$a]->ano;
        $data[count($data)-1]["quantidade"] =$this->selects()[$a]->quantidade;
        $data[count($data)-1]["isbn"] =$this->selects()[$a]->isbn;
        $data[count($data)-1]["autor"] =$this->selects()[$a]->autor;
        $data[count($data)-1]["preco"] =$this->selects()[$a]->preco;
        $data[count($data)-1]["categoria"] =$this->selects()[$a]->categoria;
        $data[count($data)-1]["editora"] =$this->selects()[$a]->editora;
        $data[count($data)-1]["edicao"] = $this->selects()[$a]->edicao;
        $data[count($data)-1]["processo"] = $this->selects()[$a]->processo;
        $data[count($data)-1]["prefacio"] = $this->selects()[$a]->prefacio;
        $data[count($data)-1]["data"] = $this->selects()[$a]->data;
      }
    }
    return json_encode($data);
  }
   public function getAutorLivro()
  {
    $data=[];
    for($a=0;$a<count($this->selects());$a++)
    {
      $bool=false;
      for($b=0;$b<count($data);$b++)
      {
        if(isset($data[$b]) && $data[$b]["id"]==$this->selects()[$a]->id)
        {
          $data[$b]["autor"] .=", ".$this->selects()[$a]->autor;
          $bool=true;
        }
      }
      if($bool===false)
      {
        $data[]["id"] =$this->selects()[$a]->id;        
        $data[count($data)-1]["autor"] =$this->selects()[$a]->autor;
      }
    }
    return json_encode($data);
  }
}
