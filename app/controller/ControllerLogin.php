<?php
namespace app\controller;
use \Cookie\cookie;

class ControllerLogin extends controller
{
  public function __construct()
  {
    session_start();

      if(isset($_POST["submit"]))
        $this->RequestLogin();

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
    $this->setTitle("QueroBukar - Login ");
    $this->setView("login/index");
  }
  public function voice()
  {
       $this->setView("login/voz");
  }
  private function RequestLogin()
  {
    $this->setModel("login/usuario")
    ->setUsuario($_POST["username"])
    ->setSenha($_POST["password"])
    ->getStart();
  }
  public function logout ()
  {
    session_destroy();
    $this->redirect("Login");
  }
  public function Cadastro()
  {
        $this->setView("login/Cadastro");
  }
}
