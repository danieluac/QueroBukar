<?php

namespace app\controller;
use app\config\defined as def;
use Upload\upload;
use \Cookie\cookie;
/**
 * Description of index
 */
class ControllerPostBiblioteca extends Controller
{
    private $model;
    public function __construct()
    {

    }

    public function getIndex ()
    {
    }
    public function ActivarContaAluno($user="")
    {
        $this->setModel("login/usuario")->where("id","=",$user)->Criar(["estado"=>"ACTIVO"])->updates();
        $this->redirect("Biblioteca/ActivarAluno");
    }
    /*
    =====================================
    * CADASTRO DO LIVRO E LISTAGEM
    =====================================
    */
    public function setLivro()
    {
      if(!empty($_POST["subForm"]))
      {
        $livro = $this->setModel("biblioteca/livro");
        $autor = $this->setModel("biblioteca/livro_tem_autor");
        if(!empty($_FILES["fileBook"]))
        {
          $up = new upload;
          $up->setPath("upload/biblioteca")->setFile($_FILES["fileBook"])->startUpload();
          $up =json_decode($up->getJson());

        if(isset($up->success[0]->Url))
        {
          $livro->setUrlFoto($up->success[0]->Url)->Register();
          $autor->setLivro($livro->selects()[count($livro->selects())-1]->id);
          $autor->Register();
        }else
        {
          $livro->Register();
          $autor->setLivro($livro->selects()[count($livro->selects())-1]->id);
          $autor->Register();
        }
      }

      }
      $this->redirect("Biblioteca/paineldelivro?XSQADEQBWSVBDRSA=true");
    }
    public function EditBook()
    {
        if(isset($_POST["opcao"]))
        {
            $livro = $this->setModel("biblioteca/livro");
            if(array_keys($_POST)[2]!="autor")
            {
                $livro->where("id","=",$_POST["idlivro"])->Criar([strtolower(array_keys($_POST)[2]) => $_POST[array_keys($_POST)[2]]])->updates();
            }
            else
            {
                $autor = $this->setModel("biblioteca/livro_tem_autor");
                $autor->where("livro_id","=",$_POST["idlivro"])->Deletes();
                for($a=0;$a<count($_POST[array_keys($_POST)[2]]);$a++)
                {
                  $autor->Criar(
                  [
                    "livro_id"=>$livro->where("id","=",$_POST["idlivro"])->selects()[0]->id,
                    "autor_id"=>strip_tags($_POST[array_keys($_POST)[2]][$a])
                  ]);
                  $autor->inserts();
                }
            }
        }
       $this->redirect("Biblioteca/listagem-de-livro");
    }
    public function getLivro()
    {
      header("Content-Type: application/json");
      $this->model = $this->setModel("biblioteca/viewlivro");
      print $this->model->where("idpreco","=",1)->getLivro();
    }
    public function getLivroVenda()
    {
      header("Content-Type: application/json");
      $this->model = $this->setModel("biblioteca/viewlivro");
      print $this->model->where("idpreco","!=",1)->getLivro();
    }
    /**
     * ===================================
     * REQUISITA O ALUNO
     * @return Json 
     * ===================================
     */
    public function getAluno()
    {
        if(isset($_GET["id"]))
        {
            print $this->setModel("register/viewaluno")
                    ->where("processo","=",$_GET["id"])
                    ->where("estado","!=","PENDENTE")->getJson();        
        }
    }
    /**
     * ===================================
     * REQUISITA O VISITANTE
     * @return Json 
     * ===================================
     */
    public function getVisitante()
    {
        if(isset($_GET["id"]))
        {
            print $this->setModel("register/visitante")->where("bilhete","=",$_GET["id"])->getJson();        
        }
    }
    /*
    =====================================
    * METODOS QUE RETORNAM JSON DA QUANTIDADE DE REGISTRO EXISTENTE NA DATABASE
    =====================================
    */
    public function CountBook()
    {
      header("Content-Type: application/json");
      $this->model = $this->setModel("biblioteca/livro");
      $this->model->where("preco","=",1);
      print json_encode(["counted"=>count($this->model->selects())]);
    }
    public function CountBookVenda()
    {
      header("Content-Type: application/json");
      $this->model = $this->setModel("biblioteca/livro");
      $this->model->where("preco","!=",1);
      print json_encode(["counted"=>count($this->model->selects())]);
    }
    /*
    =====================================
    * METODOS QUE CADASTRAM E RETORNAM JSON DO AUTOR, CATEGORIA, PREÇO, EDITORA
    =====================================
    */
    public function setAutor()
    {
      if(!empty($_POST)):
        $this->model = $this->setModel("biblioteca/autor");
        $this->model->Register();
        $this->model->setOrderBy("ORDER BY `nome` ASC");
        print json_encode($this->model->selects());
      endif;
    }
    public function getAutor()
    {
      header("Content-Type: application/json");
      if(isset($_GET["ALL"]))
      {
        $this->model = $this->setModel("biblioteca/autor");
        $this->model->setOrderBy("ORDER BY nome ASC");
        print $this->model->getJson();
      }
    }
    public function setCategoria()
    {
      if(!empty($_POST)):
        $this->model = $this->setModel("biblioteca/categoria");
        $this->model->Register();
        $this->model->where("tipo","=","Livro")->setOrderBy("ORDER BY `nome` ASC");
        print json_encode($this->model->selects());
      endif;
    }
    public function getCategoria()
    {
      header("Content-Type: application/json");
      if(isset($_GET["ALL"]))
      {
        $this->model = $this->setModel("biblioteca/categoria");
        $this->model->where("tipo","=","Livro")->setOrderBy("ORDER BY nome ASC");
        print $this->model->getJson();
      }
    }
    public function setEditora()
    {
      if(!empty($_POST)):
        $this->model = $this->setModel("biblioteca/editora");
        $this->model->Register();
        $this->model->setOrderBy("ORDER BY `nome` ASC");
        print json_encode($this->model->selects());
      endif;
    }
    public function getEditora()
    {
      header("Content-Type: application/json");
      if(isset($_GET["ALL"]))
      {
        $this->model = $this->setModel("biblioteca/editora");
        $this->model->setOrderBy("ORDER BY nome ASC");
        print $this->model->getJson();
      }
    }
    public function setPreco()
    {
      if(!empty($_POST)):
        $this->model = $this->setModel("biblioteca/preco");
        $this->model->Register();
        $this->model->setOrderBy("ORDER BY id ASC");
        print json_encode($this->model->selects());
      endif;
    }
    public function getPreco()
    {
      header("Content-Type: application/json");
      if(isset($_GET["ALL"]))
      {
        $this->model = $this->setModel("biblioteca/preco");
        $this->model->setOrderBy("ORDER BY id ASC");
        print $this->model->getJson();
      }
    }
    function setJson()
    {
      // LIXO HERE
      header("Content-Type: application/json");

      if(isset($_POST["texto"]))
      {$b=0;
        for($a=0;$a<10000000;$a++)
        {
          $b +=$a;
        }
        echo json_encode(["dados"=>$b]);
        //echo json_encode($_REQUEST);
      }
    }
    function Upload()
    {
      $up = new upload;
      $up->setPath("upload/studant");
      $up->setFile($_FILES["file"]);
      $up->startUpload();
      $up =json_decode($up->getJson());
      print_r($up->success[0]->Url);
    }
}
