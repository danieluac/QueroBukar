<?php
namespace app\controller;
use \Cookie\cookie;

class ControllerRegister extends controller
{
  public function __construct()
  {
    session_start();
    if( isset($_SESSION["UserPerfil"]) && $_SESSION["UserPerfil"]==="FUNCIONARIO" )
              $this->redirect("Biblioteca/");
    elseif(isset($_SESSION["UserPerfil"]) && $_SESSION["UserPerfil"]==="ALUNO")
              $this->redirect("Studant/");
  }
  public function getIndex()
  {
    $this->index();
  }
  public function index()
  {
    $this->setTitle("QueroBukar - Registra-se ");
    $this->setView("login/registro");
  }
  public function Activation()
  {
      $this->setTitle("QueroBukarn - Activar Conta");
      $this->setView("login/activation");
  }
  public function CreateUser()
  {
    header("Content-Type: application/json");
    if(isset($_POST["processo"]))
    {
      $id = $this->setModel("login/usuario")->RegisterStudant($_POST);

      $this->setModel("register/aluno")
      ->setUsuario($id[0]->id)->Register($_POST);
      print json_encode(["post" =>"ok"]);
    }
    $this->redirect("Register/Activation?Status=".md5("TRUESTATUS"));
  }
  public function CourseAll ()
  {

    header("Content-Type: application/json");
  
    if(isset($_GET["ALL"]) || isset($_GET["all"]))
    {
      print $this->setModel("register/curso")
            ->getJson();
    }
  }
}
