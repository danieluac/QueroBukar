<?php
namespace app\controller;
use \Cookie\cookie;
/**
 * Description of ContrrolerProfille
 *
 * @author Daniel-U-AC
 */
class ControllerStudant extends controller implements InterfaceController
{
  protected $extra= [], $view=[];
    public function __construct()
    {
        session_start();
      if(!isset($_SESSION["UserPerfil"]))
         $this->redirect("");
      elseif($_SESSION["UserPerfil"]!=="ALUNO")
         $this->redirect("");
      $this->view["placeholder"] = "procurar livro ou publicção";

      $this->view["userFoto"] = $this->setModel("login/usuario")->where("id","=",$_SESSION["UserId"])->selects()[0]->foto;
    }
    public function header($title)
    {
      $this->setTitle($title);
      $this->setView("usuario.header");
    }
    public function footer()
    {
      $this->setView("usuario.footer");
    }    
    public function profille($min=0,$cat=0)
    {
      $this->view["contar"] =$min+6;
      $this->view["cat"] = $cat!=0?$cat:0;
      $max=6;

      $this->view["categoria"] = json_decode($this->setModel("biblioteca/categoria")
      ->where("tipo","=","Forum")
        ->setOrderBy("ORDER BY nome ASC")
      ->getJson());

      $this->view["list"] = $this->setModel("forum/verforum")
              ->where("idusuario","=",$_SESSION["UserId"])
              ->setOrderBy("ORDER BY data DESC")
              ->selects();

        {
             $this->view["list"] = json_decode($this->setModel("forum/verforum")
                     ->where("idusuario","=",$_SESSION["UserId"])
                     ->setLimit("LIMIT ".$min.",".$max)->getJson());
        }

      $this->extra["menuP"]=true;
      $this->header("Perfil - estudante");
      $this->setView("usuario.menu.profille.profille");
      $this->footer();
    }
    public function forum($min=0,$cat=0)
    {
      $this->view["contar"] =$min+6;
      $this->view["cat"] = $cat!=0?$cat:0;
      $max=6;

      if($cat>0)
        {
            $this->view["list"] = json_decode($this->setModel("forum/verforum")
              ->where("idcategoria","=",$cat)
              ->setLimit("LIMIT ".$min.",".$max)->getJson());


        }else
        {
             $this->view["list"] = json_decode($this->setModel("forum/verforum")
                     ->setLimit("LIMIT ".$min.",".$max)->getJson());
        }
        $this->view["categoria"] = json_decode($this->setModel("biblioteca/categoria")->where("tipo","=","Forum")->getJson());

      $this->extra["menuF"]=true;
      $this->header("Forum - estudantil");
      $this->setView("usuario.menu.forum.forum");
      $this->footer();
    }
    public function book($min=0,$cat=0)
    {
        $this->view["contar"] =$min+6;
        $this->view["cat"] = $cat!=0?$cat:0;
        $max=6;
         $this->view["QuantidadeLivro"] = count(($this->setModel("biblioteca/verlivro")->selects()));
        if($cat>0)
        {
          $this->view["QuantidadeLivro"] = count(($this->setModel("biblioteca/verlivro")
                ->where("idcategoria","=",$cat)->selects()));

             $this->view["books"] = json_decode($this->setModel("biblioteca/verlivro")
              ->where("idcategoria","=",$cat)
              ->setLimit("LIMIT ".$min.",".$max)->getJson());
        } else
        {

            $this->view["books"] = json_decode($this->setModel("biblioteca/verlivro")
              ->setLimit("LIMIT ".$min.",".$max)->getJson());
        }
      $this->view["categoria"] = json_decode($this->setModel("biblioteca/categoria")->where("tipo","=","Livro")->getJson());

      $this->extra["menuB"]=true;
      $this->header("Livros - Solicitações");
      $this->setView("usuario.menu.book.book");
      $this->footer();
    }
    public function getBooks()
    {
      header("Content-Type: application/json");
      $this->model = $this->setModel("biblioteca/viewlivro");
      print $this->model->setLimit("LIMIT 2")->getLivro();
    }
    public function User ()
    {
        
        $this->view["userFoto"] = $this->setModel("login/usuario")->where("id","=",$_GET["QbId"])->selects();
        
        $this->view["userData"] = $this->setModel("register/viewaluno")->where("idusuario","=",$_GET["QbId"])->selects();
        
        $this->view["userFoto"] = count($this->view["userFoto"])>0? $this->view["userFoto"][0]->foto : "";
        
        $this->setTitle
                (
                    count($this->view["userData"] )>0?
                    $this->view["userData"][0]->pri_nome." ".$this->view["userData"][0]->ult_nome 
                    :" QueroBukar User"
                );
        
        $this->setView("usuario.menu.profille.user");
        $this->footer();
        
    }
    public function config()
    {
        $this->extra["menuC"]=true;
        
       $this->view["userData"] = $this->setModel("register/viewaluno")->where("idusuario","=",$_SESSION["UserId"])->selects();
       $this->view["solicitado"] = $this->setModel("biblioteca/solicitacaointerna")
               ->where("idusuario","=",$_SESSION["UserId"])
               ->where("estado","=","PENDENTE")
               ->setLimit("LIMIT 2")->selects();
       
      $this->header("Configurações");
      $this->setView("usuario.menu.profille.configuracoes");
      $this->footer();

    }
    public function getIndex()
    {
        $this->profille();
    }
}
