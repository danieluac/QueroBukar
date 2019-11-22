<?php
namespace app\controller;
use mPDF;


class ControllerRelatorio extends controller
{
    protected $css,$list;
    public function __construct ()
  {
        session_start();
  }
  public function getIndex()
  {

  }
  public function ControlVendasToday()
  {
      $this->list["funcionario"]=$this->view["list"] =$this->setModel("register/funcionario")
              ->where("id","=",''.$_SESSION["FuncionarioId"])->selects()[0];
      
      $this->list["lista1"]=$this->view["list"] =$this->setModel("biblioteca/viewlivrovendidointerno")
            ->where("data_vendido","=",''.date("Y-m-d"))
            ->where("idfuncionario","=",''.$_SESSION["FuncionarioId"])->getJson();
      
      $this->list["lista2"]=$this->view["list"] =$this->setModel("biblioteca/viewlivrovendidoexterno")
            ->where("data_vendido","=",''.date("Y-m-d"))
            ->where("idfuncionario","=",''.$_SESSION["FuncionarioId"])->getJson();
      
      $this->requireFile("extra/mpdf60/mpdf");
      
      $mpdf = new mPDF("UTF-8", "A4","","",15,10,10,10);
      $mpdf->setHeader();
      $mpdf->AddPage('P');
      
      $this->css["bootstrap"] = file_get_contents("assets/bootstrap/dist/css/bootstrap.min.css");
      $this->css["css"] = file_get_contents("assets/css/relatorio.css");
      
      $html = $this->setView("relatorio/solicitacao/livrosvendidoshoje");
      $mpdf->writeHTML ($html);
      $mpdf->Output("relatorio de vendas.pdf", "I");
  }
  public function ControlVendasOld()
  {
      if(isset($_GET['date']))
      {
        $this->list["funcionario"]=$this->view["list"] =$this->setModel("register/funcionario")
              ->where("id","=",''.$_SESSION["FuncionarioId"])->selects()[0];
        
        $this->list["lista1"]=$this->view["list"] =$this->setModel("biblioteca/viewlivrovendidointerno")
              ->where("data_vendido",">=",''.$_GET['date'])
              ->where("data_vendido","<=",''.$_GET['date1'])
              ->setOrderBy("ORDER BY id ASC")
              ->where("idfuncionario","=",''.$_SESSION["FuncionarioId"])->getJson();

        $this->list["lista2"]=$this->view["list"] =$this->setModel("biblioteca/viewlivrovendidoexterno")
              ->where("data_vendido","=",''.$_GET['date'])
              ->where("idfuncionario","=",''.$_SESSION["FuncionarioId"])->getJson();

        $this->requireFile("extra/mpdf60/mpdf");

        $mpdf = new mPDF("UTF-8", "A4","","",15,10,10,10);
        $mpdf->setHeader();
        $mpdf->AddPage('P');

        $this->css["bootstrap"] = file_get_contents("assets/bootstrap/dist/css/bootstrap.min.css");
        $this->css["css"] = file_get_contents("assets/css/relatorio.css");

        $html = $this->setView("relatorio/solicitacao/livrosvendidoshoje",["data"=>$_GET['date'],"data1"=>$_GET['date1']]);
        $mpdf->writeHTML ($html);
        $mpdf->Output("relatorio de vendas.pdf", "I");
      }
  }
  public function Factura($nome="",$processo="",$id="")
  {
      $this->requireFile("extra/mpdf60/mpdf");

        $mpdf = new mPDF("UTF-8", "A6","","",3,2,5,4);
        $mpdf->setHeader();
        $mpdf->AddPage('P');

        $this->css["bootstrap"] = file_get_contents("assets/bootstrap/dist/css/bootstrap.min.css");
        $this->css["css"] = file_get_contents("assets/css/relatorio.css");
        
        $this->view["list"] = json_decode($this->setModel("biblioteca/viewlivrovendidointerno")
                    ->where("idsolicitacao","=",$id)->getJson());
        
        if(count($this->view["list"])==0)
        :
            $this->view["list"] = json_decode($this->setModel("biblioteca/viewlivrovendidoexterno")
                    ->where("idsolicitacao","=",$id)->getJson());        
        endif;

        $html = $this->setView("relatorio/solicitacao/factura");
        $mpdf->writeHTML ($html);
        $mpdf->Output("Factura de venda $id.pdf", "I");
  }
  public function AllBook()
  {
      
  }
  public function AllBookVenda()
  {
      
  }
  public function AllBookNoVenda()
  {
      $this->requireFile("extra/mpdf60/mpdf");

        $mpdf = new mPDF("UTF-8", "A4","","",10,10,10,10);
        $mpdf->setHeader();
        $mpdf->AddPage('P');

        $this->css["bootstrap"] = file_get_contents("assets/bootstrap/dist/css/bootstrap.min.css");
        $this->css["css"] = file_get_contents("assets/css/relatorio.css");
       
        $this->list["funcionario"]=$this->view["list"] =$this->setModel("register/funcionario")
              ->where("id","=",''.$_SESSION["FuncionarioId"])->selects()[0];
        
       if(isset($_GET["data"]))
            :            
               $this->view["list"] =$this->setModel("biblioteca/viewlivro")
               ->where("data",">=",$_GET["data"])
               ->where("data","<=",$_GET["data1"])
               ->getLivro();            
            
            endif;
      
        $html = $this->setView("relatorio/solicitacao/livros");
        $mpdf->writeHTML ($html);
        $mpdf->Output("relatorio .pdf", "I");
  }
}
