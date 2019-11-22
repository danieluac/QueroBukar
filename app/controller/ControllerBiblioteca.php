<?php

namespace app\controller;
use Fonte\Basedados\Capsula\Capsula;
/**
 * Description of index
 */
class ControllerBiblioteca extends Controller implements InterfaceController
{
    protected $view;
    public function __construct()
    {
        session_start();
      if(!isset($_SESSION["UserPerfil"]))
        $this->redirect("");
      elseif($_SESSION["UserPerfil"]!=="FUNCIONARIO")
        $this->redirect("");
      date_default_timezone_set('Africa/Luanda');

      if(isset($_SESSION["UserId"]))
      {
          $_SESSION["FuncionarioId"] = $this->setModel("register/funcionario")->where("usuario","=",$_SESSION["UserId"])->selects()[0]->id;
      }
    }
    public function header($title)
    {
      $this->setTitle($title);

      $this->setView("biblioteca.main.header");
    }
    public function footer()
    {

    }
    public function getIndex ()
    {
      $this->dashboard();
    }
   
    public function dashboard()
    {
      $this->view["activeDash"]=true;
      
      $this->header("QueroBukar - Biblioteca - dashboard");
        $this->setView("biblioteca.menu.dashboard");
    }
    public function paineldelivro()
    {
      $this->view["activep"]=true;
      $this->view["contadorLivrosRoubados"] = 0;
      
      $this->view["contadorLivrosRoubados"] = count($this->setModel("biblioteca/viewlivroleiturainterna")
              ->where("estado","=","ROUBADO")
              ->where("estado","=","FRATURADO","OR")
              ->selects());
      
      $this->view["contadorLivrosRoubados"] += count($this->setModel("biblioteca/viewlivroleituraexterna")
              ->where("estado","=","ROUBADO")
              ->where("estado","=","FRATURADO","OR")
              ->selects());
      
      $this->header("QueroBukar - Biblioteca - painel do livros");
        $this->setView("biblioteca.menu.livro");
    }
    public function listagemdelivro($data="",$data1="")
    {
      $this->view["activep"]=true;
       
            if(isset($_GET["data"]))
            :            
               $this->view["list"] =$this->setModel("biblioteca/viewlivro")
               ->where("data",">=",$_GET["data"])
               ->where("data","<=",$_GET["data1"])
               ->where("idpreco","=",1)->getLivro();            
            else:
                 $this->view["list"] =$this->setModel("biblioteca/viewlivro")
                 ->where("idpreco","=",1)->getLivro();
            endif;
      $this->header("QueroBukar - Biblioteca - Lista dos livros");
        $this->setView('biblioteca.menu.livroNaoVenda');
    }
    public function livroAvenda()
    {
        $this->view["activep"]=true;
        
        if(isset($_GET["data"]))
        : 
            $this->view["list"] =$this->setModel("biblioteca/viewlivro")
            ->where("data",">=",$_GET["data"])
            ->where("data","<=",$_GET["data1"])
            ->where("idpreco","!=",1)->getLivro();
        else:
            $this->view["list"] =$this->setModel("biblioteca/viewlivro")
            ->where("idpreco","!=",1)->getLivro();
        endif;
      
      
      $this->header("QueroBukar - Biblioteca - venda dos livros");
        $this->setView('biblioteca.menu.livroVenda');
    }
    public function Editor($editar)
    {
        $this->view= ["daniel"=>1234,"victor"=>"lembga"];

        print_r(array_keys($this->view));
        //$this->header("Editar ".$editar);
        //$this->setView("biblioteca.modals.modalEditorLivro");
    }
    public function RequestBook()
    {
      $this->view["activeS"]=true;
      $this->view["list"] =$this->setModel("biblioteca/solicitacaoInterna")
      ->where("data_solicitado","=",''.date("Y-m-d"))
      ->where("estado","=","PENDENTE")->getJson();
      $this->header("QueroBukar - Biblioteca - solicitação dos livros");
      $this->setView('biblioteca.menu.Solicitacoes');

      // REMOVE AS SOLICITAÇÕES ANTIGAS PENDENTE
      $this->RemoveOldRequest();
    }
    public function RequestBookExtern()
    {
        $this->view["activeS"]=true;
      $this->view["list"] =$this->setModel("biblioteca/solicitacaoExterna")
      ->where("data_solicitado","=",''.date("Y-m-d"))
      ->where("estado","=","PENDENTE")->getJson();
      $this->header("QueroBukar - Biblioteca - solicitação dos livros");
        $this->setView('biblioteca.menu.SolicitacaoExterna');
    }
    public function BookOcupadoInterno()
    {
      $this->view["activeS"]=true;
      $this->view["list"] =$this->setModel("biblioteca/viewlivroleiturainterna")
    //  ->where("data_lida","=",''.date("Y-m-d"))
      ->where("estado","=","OCUPADO")->getJson();

      $this->header("QueroBukar - Biblioteca - solicitação dos livros");
      $this->setView('biblioteca.menu.livrosOcupadosInterno');
    }
    public function BookOcupadoExterno()
    {
      $this->view["activeS"]=true;
      $this->view["list"] =$this->setModel("biblioteca/viewlivroleituraexterna")
    //  ->where("data_lida","=",''.date("Y-m-d"))
      ->where("estado","=","OCUPADO")->getJson();

      $this->header("QueroBukar - Biblioteca - solicitação dos livros");
      $this->setView('biblioteca.menu.livrosOcupadosExterno');
    }
    public function BookVendidoExtern()
    {
         $this->view["activeS"]=true;
         $this->view["list"] =$this->setModel("biblioteca/viewlivrovendidoexterno")
            ->where("data_vendido","=",''.date("Y-m-d"))
            ->getJson();

         $this->header("QueroBukar - Biblioteca - Livros vendidos aos visitantes");
         $this->setView('biblioteca.menu.livrosVendidosExterno');
    }
    public function BookVendidoIntern()
    {
         $this->view["activeS"]=true;
         $this->view["list"] =$this->setModel("biblioteca/viewlivrovendidointerno")
            ->where("data_vendido","=",''.date("Y-m-d"))
            ->getJson();

         $this->header("QueroBukar - Biblioteca - Livros vendidos aos alunos");
         $this->setView('biblioteca.menu.livrosVendidosInterno');
    }
    public function DanificatedIntern()
    {
      $this->view["activeS"]=true;
      
      if(isset($_GET["data"]))
      :
          $this->view["list"] =$this->setModel("biblioteca/viewlivroleiturainterna")
          ->where("data_lida",">=",$_GET["data"])
          ->where("data_lida","<=",$_GET["data1"])
          ->where("estado","=","FRATURADO","AND")
          ->where("data_lida",">=",$_GET["data"],"OR")
          ->where("data_lida","<=",$_GET["data1"])
          ->where("estado","=","ROUBADO")->getJson();
      else:
          $this->view["list"] =$this->setModel("biblioteca/viewlivroleiturainterna")
         ->where("estado","=","FRATURADO")
         ->where("estado","=","ROUBADO","OR")->getJson();
      endif;
      

      $this->header("QueroBukar - Biblioteca - livros danificados por alunos");
      $this->setView('biblioteca.menu.livrosDanificadosInterno');
    }
     public function DanificatedExtern()
    {
        $this->view["activeS"]=true;

      if(isset($_GET["data"]))
      :
          $this->view["list"] =$this->setModel("biblioteca/viewlivroleituraexterna")
          ->where("data_lida",">=",$_GET["data"])
          ->where("data_lida","<=",$_GET["data1"])
          ->where("estado","=","FRATURADO","AND")
          ->where("data_lida",">=",$_GET["data"],"OR")
          ->where("data_lida","<=",$_GET["data1"])
          ->where("estado","=","ROUBADO")->getJson();
      else:
          $this->view["list"] =$this->setModel("biblioteca/viewlivroleituraexterna")
         ->where("estado","=","FRATURADO")
         ->where("estado","=","ROUBADO","OR")->getJson();
      endif;

      $this->header("QueroBukar - Biblioteca - livros danificados por alunos");
      $this->setView('biblioteca.menu.livrosDanificadosExterno');
    }
    /**
     * historico de trabalho do funcionario
     * @return void
     */
    public function WorkHistory()
    {
      $this->view["activep"]=true;
      $this->header("QueroBukar - Biblioteca - Histórico de trabalho");
      $this->setView('biblioteca.menu.historico');
    }
    /**
     *
     */
   private function RemoveOldRequest()
   {
      $this->setModel("biblioteca/solicitacao")
      ->where("data_solicitado","<",''.date("Y-m-d"))
      ->where("estado","=","PENDENTE","AND")->Deletes();
   }
   public function ActivarAluno()
   {
       $this->view["list"] = $this->setModel("register/viewaluno")->where("estado","=","PENDENTE")->getJson();
        $this->view["activeD"]=true;

         $this->header("QueroBukar - Biblioteca - Activar conta do aluno");
        $this->setView('biblioteca.menu.activarAluno');
   }
   public function Settings()
   {
        $this->view["activeD"]=true;
         $this->header("QueroBukar - Biblioteca - Definições");
        $this->setView('biblioteca.menu.definicoes');
   }
   
   
   /* 
    * ==============================================
    * ==============================================
    * =================================================================================
    * ==================================================================================
    * GRAFICOS
    */
   public function getGraficosVenda ()
    {
        if(isset($_GET["venda"]))
        {
            $interno = $externo=0;
            
            $this->view["vendaInt"]=$this->view["list"] =$this->setModel("biblioteca/viewlivrovendidointerno")
            ->where("data_vendido","=",''.date("Y-m-d"))
            ->where("idfuncionario","=",''.$_SESSION["FuncionarioId"])->selects();
             
             for($a=0;$a<count($this->view["vendaInt"]);$a++)
             {
                 $interno +=$this->view["vendaInt"][$a]->quantidade_vendido*$this->view["vendaInt"][$a]->preco_livro;
             }
             
            $this->view["vendaInt"] = "";
            
            $this->view["vendaInt"] = $this->view["list"] =$this->setModel("biblioteca/viewlivrovendidoexterno")
            ->where("data_vendido","=",''.date("Y-m-d"))
            ->where("idfuncionario","=",''.$_SESSION["FuncionarioId"])->selects();
             
             for($a=0;$a<count($this->view["vendaInt"]);$a++)
             {
                 $externo +=$this->view["vendaInt"][$a]->quantidade_vendido*$this->view["vendaInt"][$a]->preco_livro;
             }
             $total = $interno + $externo;
             
             print json_encode(["total" => (int) $total,"interno" => (int) $interno,"externo" => (int) $externo]);
             
             return 1;      
        }
      print json_encode(["total" => 2,"interno" => 1,"externo" => 1]);
    }
    public function getLivrosGrafico()
    {
        if(isset($_GET["Livros"]))
        {
            $mas =[];
           $contou1 = $this->contador
                   (
                   "SELECT idlivro, livro, COUNT('idlivro') as contado from viewlivrovendidointerno WHERE idlivro=:id"
                   ,"biblioteca/livro"
                   );
           $contou2 = $this->contador
                   (
                   "SELECT idlivro, livro, COUNT('idlivro') as contado from viewlivrovendidoexterno WHERE idlivro=:id"
                   ,"biblioteca/livro"
                   );           
           for($a=0;$a<count($contou1);$a++)
           {
               if($contou1[$a]["id"]===$contou2[$a]["id"]):
                   $mas[0]["masvendido"] = $contou1[$a]["contado"]+$contou2[$a]["contado"];
                   $mas[0]["livro"] = $contou1[$a]["livro"];
               else: 
                   if($contou1[$a]["id"]>=$contou2[$a]["id"]):
                       $mas[0]["masvendido"] = $contou1[$a]["contado"];
                       $mas[0]["livro"] = $contou1[$a]["livro"];
                   else: 
                       $mas[0]["masvendido"] = $contou2[$a]["contado"];
                       $mas[0]["livro"] = $contou2[$a]["livro"];
                   endif;
               endif;
           }           
           $contou3 = $this->contador
                   (
                   "SELECT idlivro, livro, COUNT('idlivro') as contado from viewlivroleiturainterna WHERE idlivro=:id"
                   ,"biblioteca/livro"
                   );
          $contou4 = $this->contador
                   (
                   "SELECT idlivro, livro, COUNT('idlivro') as contado from viewlivroleituraexterna WHERE idlivro=:id"
                   ,"biblioteca/livro"
                   );
          for($a=0;$a<count($contou3);$a++)
           {
               if($contou3[$a]["id"]===$contou4[$a]["id"]):
                   $mas[1]["maslido"] = $contou3[$a]["contado"]+$contou4[$a]["contado"];
                   $mas[1]["livro"] = $contou3[$a]["livro"];
               else: 
                   if($contou3[$a]["id"]>=$contou4[$a]["id"]):
                           $mas[1]["maslido"] = $contou3[$a]["contado"];
                           $mas[1]["livro"] = $contou3[$a]["livro"];
                       else:
                           $mas[1]["maslido"] =$contou4[$a]["contado"];
                   $mas[1]["livro"] = $contou4[$a]["livro"];
                   endif;
               endif;
           }  
           $contou5 = $this->contador
                   (
                   "SELECT idlivro, livro, COUNT('idlivro') as contado from solicitacaointerna WHERE idlivro=:id"
                   ,"biblioteca/livro"
                   );
          $contou6 = $this->contador
                   (
                   "SELECT idlivro, livro, COUNT('idlivro') as contado from solicitacaoexterna WHERE idlivro=:id"
                   ,"biblioteca/livro"
                   );
          for($a=0;$a<count($contou5);$a++)
           {
               if($contou5[$a]["id"]===$contou6[$a]["id"]):
                   $mas[2]["massolicitado"] = $contou5[$a]["contado"]+$contou6[$a]["contado"];
                   $mas[2]["livro"] = $contou5[$a]["livro"];
               else: 
                   if($contou5[$a]["id"]>=$contou6[$a]["id"]):
                           $mas[2]["massolicitado"] = $contou5[$a]["contado"];
                           $mas[2]["livro"] = $contou5[$a]["livro"];
                       else:
                           $mas[2]["massolicitado"] =$contou6[$a]["contado"];
                           $mas[2]["livro"] = $contou6[$a]["livro"];
                   endif;
               endif;
           }
           if($mas[2]["massolicitado"]>$mas[1]["maslido"])               
           {
               if($mas[2]["massolicitado"]>$mas[0]["masvendido"])
                   $mas[2]["massolicitado"] = $mas[2]["massolicitado"];
               else 
                   $mas[2]["massolicitado"] = $mas[0]["masvendido"];
            }elseif($mas[1]["maslido"]>$mas[0]["masvendido"])
            {
                $mas[2]["massolicitado"] = $mas[1]["maslido"];
            }
            
           print json_encode
            ([
                "vendido" =>
                [
                    "mas" => (int) $mas[0]["masvendido"],"livro" => $mas[0]["livro"]
                ],
                "lido" =>
                [
                    "mas" => (int) $mas[1]["maslido"], "livro" => $mas[1]["livro"]
                ],
                "solicitado" =>
                [
                    "mas" => (int) $mas[2]["massolicitado"], "livro" => $mas[2]["livro"]
                ]
            ]);
           return 1;
        }        
    }
    protected function contador($sql,$obj)
    {
        $livro = $this->setModel($obj)->selects();
            $maior = [];
            $maior[0]["contado"]=0;           
            $Lv1 =[];
            
            for($a=0;$a<count($livro);$a++)
            {
                $con = Capsula::get_conect()->prepare($sql);
                $con->bindValue(":id",$livro[$a]->id);
                
                if($con->execute() and $con->rowCount()>0)
                {
                    $con = $con->fetchObject();
                    
                    $Lv1[]["contado"] = $con->contado;
                    $Lv1[count($Lv1)-1]["livro"] = $con->livro;
                    $Lv1[count($Lv1)-1]["id"] = $con->idlivro;
                }
            }
            for($c=0;$c<count($Lv1);$c++)
            {
               if($Lv1[$c]["contado"]>$maior[0]["contado"])
               {
                   $maior[0]["contado"] = $Lv1[$c]["contado"];
                   $maior[0]["livro"] = $Lv1[$c]["livro"];
                   $maior[0]["id"] = $Lv1[$c]["id"];
               }
            }
            return $maior;
    }
            

}
