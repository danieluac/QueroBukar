<?php

namespace app\controller;
use Upload\upload;
/**
 * Description of ControllerRelatorio
 *
 * @author DanielUAC
 */
class ControllerPostRequest extends controller
{
    public function __construct() {
        session_start();
    }
    public function getIndex()
    {

    }
    public function RequestIntern()
    {
        if(isset($_POST["idusuario"]))
        {
            $this->setModel("biblioteca/solicitacao")->Register($_POST);
        }
        $this->redirect("Biblioteca/Request-Book");

    }
    public function RequestInternJson()
    {
        if(isset($_POST["idusuario"]))
        {
            $this->setModel("biblioteca/solicitacao")->Register($_POST);
            print json_encode
                   ([
                        "val"   => "success",
                        "text"  => "Solicitação efectuada com sucesso",
                        "remet" => "tens 10 minutos pra ir a biblioteca receber o livro!. "
                    ]);
                   return 0;
        }
       print json_encode
               ([
                   "val"   => "warning",
                   "text"  => "Erro, solicitação não efectuada",
                   "remet" => "conexão falhou..."
                ]);
    }
    public function RequestExtern()
    {
        if(!isset($_POST["idusuario"]))
        {
           $id = $this->setModel("login/usuario")->RegisterVisitante($_POST);
           $this->setModel("register/visitante")->setUsuario($id[0]->id)->Register($_POST);

          $this->setModel("biblioteca/solicitacao")->setUsuario($id[0]->id)->RegisterExtern($_POST);
        }else
             $this->setModel("biblioteca/solicitacao")->Register($_POST);

        $this->redirect("Biblioteca/Request-Book-Extern");
    }
    public function EffectRequest()
    {
        if(isset($_POST["idsolicitacao"]))
        {
            $idlivro = $this->setModel("biblioteca/solicitacao")->where("id","=",$_POST["idsolicitacao"])->selects()[0]->livro;
            $quant = $this->setModel("biblioteca/livro")->where("id","=",$idlivro)->selects()[0]->quantidade;
                
            if($_POST["opcao"]==="Leitura")
            {
                 if($_POST["quantidade"]<=$quant && $quant>0 && $_POST["quantidade"]>0)
                {
                     $quant=$quant-1;
                    $this->setModel("biblioteca/livro")->where("id","=",$idlivro)->Criar(["quantidade"=>$quant])->updates();
                    
                    $this->setModel("biblioteca/solicitacao")
                            ->where("id","=",$_POST["idsolicitacao"])
                            ->Criar(["estado"=>"ATENDIDO"])->updates();

                    $this->setModel("biblioteca/leitura")->Register();
                    
                   print json_encode(["val"=>true,"venda"=>false,"text"=>"Solicitação para leitura efectuada com sucesso"]);
                   return 0;
                }else
                    {
                        print json_encode(["val"=>false,"text"=>"Não foi possivel atender a solicitação!. Verifique o stock do livro. Obrigado!"]);
                        return 0;
                    }
                   
            }elseif($_POST["opcao"]==="Compra")
            {
                

                if($_POST["quantidade"]<=$quant && $quant>0 && $_POST["quantidade"]>0)
                {
                    $quant=$quant-$_POST["quantidade"];
                    $this->setModel("biblioteca/livro")->where("id","=",$idlivro)->Criar(["quantidade"=>$quant])->updates();

                    $this->setModel("biblioteca/solicitacao")
                        ->where("id","=",$_POST["idsolicitacao"])
                        ->Criar(["estado"=>"ATENDIDO"])->updates();

                 $this->setModel("biblioteca/vendido")->Register();

                 print json_encode(["val"=>true,"venda"=>true,"text"=>"Solicitação para venda efectuada com sucesso"]);
                 return 0;
                }  else
                    {
                        print json_encode(["val"=>false,"text"=>"Não foi possivel atender a solicitação!. Verifique o stock do livro. Obrigado!"]);
                        return 0;
                    }
            }
        }
        print json_encode(["val"=>false,"text"=>"Não foi possível atender a solicitação"]);
    }
    public function UpdateLeitura()
    {
        if(isset($_POST["idleitura"]))
        {
           date_default_timezone_set('Africa/Luanda'); 
           
             $leitura = $this->setModel("biblioteca/leitura")
             ->where("id","=",$_POST["idleitura"]);
             if($_POST["estado"]!=="ROUBADO" && $_POST["estado"]!=="FRATURADO")
             {
                 $quant= 0;
                 $livro = $this->setModel("biblioteca/viewlivroleiturainterna")->where("id","=",$_POST["idleitura"])->selects();
                 
                 
                 if(count($livro)!==0)
                 :
                    $Uplivro = $this->setModel("biblioteca/livro")->where("id","=",$livro[0]->idlivro);
                    $quant = $Uplivro->selects()[0]->quantidade;
                    $Uplivro->Criar(["quantidade" => $quant+1])->updates();
                    
                    $leitura->Criar
                    ([
                        "data_devolvida" => date("Y-m-d"),
                        "hora_devolvida" => date("H:i:s"),
                        "estado" => strip_tags($_POST["estado"]),
                        "obs" => strip_tags($_POST["obs"])
                    ])->updates();
                else:
                    $livro = $this->setModel("biblioteca/viewlivroleituraexterna")->where("id","=",$_POST["idleitura"])->selects();
                
                    $Uplivro = $this->setModel("biblioteca/livro")->where("id","=",$livro[0]->idlivro);
                    $quant = $Uplivro->selects()[0]->quantidade;
                    $Uplivro->Criar(["quantidade" => $quant+1])->updates();
                    
                    $leitura->Criar
                    ([
                        "data_devolvida" => date("Y-m-d"),
                        "hora_devolvida" => date("H:i:s"),
                        "estado" => strip_tags($_POST["estado"]),
                        "obs" => strip_tags($_POST["obs"])
                    ])->updates();
                    
                endif;
                 
                 
             }else
             {
                $leitura->UpdateRegister();             
             }
        }
        $this->redirect("Biblioteca/BookOcupadoInterno");
    }
    public function RemoveRequest($id)
    {
       $this->setModel("biblioteca/solicitacao")->where("id","=",$id)->Deletes();
       $this->redirect("Biblioteca/Request-Book");
    }
    /*
     * ======================================= SECTION STUDANT =========================================
     * ============================================================    ======================================
     * ==============================   ================================================================
     * =======================                              =================================================
     */
    public function AllBook()
    {
        if(isset($_REQUEST["ALL"]))
        {
            print $this->setModel("biblioteca/viewlivro")->getlivro();
        }
    }
    public function Publication()
    {
       if(isset($_POST["idcategoria"]))
       {
           $foto= new upload();
           $url = $foto->setFile($_FILES["file"])->setPath("upload/studant")->startUpload()->getJson();
           
           $this->setModel("forum/forum")->setUrlFoto
           (json_decode($url)->success[0]->Url)
            ->Register($_POST);
       }
       $this->redirect("Studant/profille");
    }
    public function Commentation()
    {
        if(isset($_POST["idusuario"]))
        {
            $this->setModel("forum/comentario")->Register($_POST);
            
           print $this->setModel("forum/vercomentario")
            ->where("idforum","=",$_POST["idforum"])->getJson();            
        }
    }
    public function UserFile()
    {
        if(isset($_FILES["fileUser"]))
        {
            $foto= new upload();
           $url = $foto->setFile($_FILES["fileUser"])->setPath("upload/user")->startUpload()->getJson();
           
            $this->setModel("login/usuario")->where("id","=",$_SESSION["UserId"])
                 ->Criar(["foto" => json_decode($url)->success[0]->Url])->updates();
         //print_r($url);
        }
        $this->redirect("Studant/");
    }
}
