<?php

$nome = "";

if(isset($this->view["list"][0]->pri_nome_aluno))
:
    $nome = $this->view["list"][0]->pri_nome_aluno." ".$this->view["list"][0]->ult_nome_aluno;
else:
    $nome = $this->view["list"][0]->pri_nome_visitante." ".$this->view["list"][0]->ult_nome_visitante;
endif;
return '
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Factura de venda de livro nº '.$this->view["list"][0]->id.'</title>
   <style>
        body{color: #000000 !important; font-family: "verdana" !important;
        background:url(.'.$this->asset("images/g8.jpg").')  center;}
        header { width: 100%;padding:0px 5px 5px 5px; text-align: justify;}
         header h3 { font-size: 12px !important;margin:0px; }
        header h5 { font-size: 10px;margin:0px; }
        section { width: 100%;  padding: 10px !important;}
        table{text-align:center; }
        tr td {  font-size:12px; padding:5px; }
        tr th{font-size:12px;background:#000;color:#fff; padding:2px; }
         section h3 { font-size: 8px !important;margin:0px;  }
        header  h6 {font-size:8px;font-weight:bolder;margin:0px; }
        img { margin:10px 0px 20px 10px;     width:110px; height:100px; float:left;}
        .div-header{ text-alig:left; padding:60px 0px 0px 70px;}
        .div-header h3{font-size:11px}
        .header-main{background:#fff;width:100%;min-height:100px;margin-left:9px;}
    </style>

    </head>
    <body>
    <header>
<strong>        <img src="'.$this->asset("icones/querobukar.jpg").'" />
    <div class="div-header"><h3>Factura <br/>Nº '.$this->view["list"][0]->id.'</h3></div>
        <div class="header-main">
        <h3>Cliente: '.$nome.' </h3>
            </div>
        </header>
       <article id="Text-Factura"  >
    <table class="table table-striped table-bordered table-hover" width="100%">
              <thead>
               <tr>
                  <th>Item</th>
                  <th>Quantidade</th>
                  <th>Preço/unit</th>
                   <th>Total em Kz</th>
              </tr>

              </thead>
              <tbody>
                  <tr>
                    <td>'.$this->view["list"][0]->livro.'</td>
                    <td>'.$this->view["list"][0]->quantidade_vendido.'</td>
                    <td>'.$this->view["list"][0]->preco_livro.'Kz</td>
                    <td>'.($this->view["list"][0]->preco_livro*$this->view["list"][0]->quantidade_vendido).'Kz</td>
                  </tr>
                  <tr><td></td><td></td><td></td><td></td></tr>
                                    <tr><td > <strong>Consumo Total:</strong></td>
                                    <td></td><td></td>
                                    <td><strong>'.($this->view["list"][0]->preco_livro*$this->view["list"][0]->quantidade_vendido).'Kz</strong></td></tr>

              </tbody>
          </table>
       
  <header>
        <div class="header-main" style="margin-top:50px">
           
         <h5 >###############################################</h5>
          
          
         <h5>Local: Rangel, Bairo CTT, junto ao ISUTIC. <br/>
         Contactos: +244 943 86 10 45 | +244 992 45 92 56</h5> </strong>
           <h5 style="font-size:9px;margin-top:5px;" >* processado por computador aos  '.date("d").' de '.$this->meses(date("m")).' de '.date("Y").' as '.date("H:i:s").'</h5>
            <h5>###############################################</h5>
           </div>
        </header>
</article>

    </body>
</html>';
