<?php
 

$dia = 'Relatório de livros cadastrados no dia '
        .date("d", strtotime($_GET["data"])).' de '.$this->Meses(date("m", strtotime($_GET["data"]))).' de '.date("Y", strtotime($_GET["data"])).' ate o dia '
        .date("d", strtotime($_GET["data1"]))." de ".$this->Meses(date("m", strtotime($_GET["data1"]))).' de '.date("Y", strtotime($_GET["data1"]));

 $list='';
 $this->view["list"]=json_decode($this->view["list"]);
               for($a=0;$a<count(  $this->view["list"]);$a++)
              {
                $list.='<tr>
                  <td >'.$this->view["list"][$a]->titulo.'</td>
                  <td >'.$this->view["list"][$a]->autor.'</td>
                  <td >'.$this->view["list"][$a]->editora.'</td>
                  <td >'.$this->view["list"][$a]->categoria.'</td>
                  <td >'.$this->view["list"][$a]->edicao.'</td>
                  <td >'.$this->view["list"][$a]->ano.'</td>
                  <td >'.$this->view["list"][$a]->quantidade.'</td>
                  <td >'.$this->view["list"][$a]->preco.'</td>
                </tr>';
             }
 
 
 
 
 return
'
<html lang="pt-pt">
<head>
<meta chasrset="UTF-8" />
<title>Relatório de Vendas </title>

<style>
*{margin:0px; padding:0px;}
body{}
'.$this->css["bootstrap"].$this->css["css"].'

</style>
</head>
<body>
  <div class="div-top">
      <img src="'.$this->asset("icones/querobukar.jpg").'" />
    <h1>Biblioteca Escolar</h1>
    <h3>'.$dia.'</h3>
  </div>
  <div class="">
  
  <table  class="table table-striped  table-bodered table-hover">
                <thead>
                    <tr>
                <th>Livro</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Categoria</th>
                 <th>Edição</th>
                <th>Ano</th>
                <th>Quantidade</th>
                <th>Preço/Kz</th>

            </tr>
                    
                </thead>
                <tbody>
                      '.$list.'
                    </tbody>
            </table>
  </div>
  <div class="section-footer">
  <h3>Luanda aos '.date("d").' de '.$this->Meses(date("m")).' de '.date("Y").'</h3>
  <h4>O responsavel </h4>
  <p>___________________________________________________________________________________________ </p>
  <h6>'.$this->list["funcionario"]->pri_nome." ".$this->list["funcionario"]->ult_nome.'</h6>
  </div>

</body>
</html>
';
