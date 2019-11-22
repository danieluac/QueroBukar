<?php
$dia ="";
if(isset($data["data"]))
:
    $dia = 'Relatório de vendas do dia '
        .date("d", strtotime($data["data"])).' de '.$this->Meses(date("m", strtotime($data["data"]))).' de '.date("Y", strtotime($data["data"])).' ate o dia '
        .date("d", strtotime($data["data1"]))." de ".$this->Meses(date("m", strtotime($data["data1"]))).' de '.date("Y", strtotime($data["data1"]));
else:
    $dia ='Relatório de vendas do dia '.date("d").' de '.$this->Meses(date("m")).' '.date("Y");
endif;
 $this->list["lista1"] = json_decode($this->list["lista1"]);
 $list = "";
 $valor =0;
 for($a=0;$a<count($this->list["lista1"]);$a++)
 {
     $valor +=$this->list["lista1"][$a]->preco_livro*$this->list["lista1"][$a]->quantidade_vendido;
     $list .='  <tr>
                        <td >'.$this->list["lista1"][$a]->id.'</td>
                        <td >'.$this->list["lista1"][$a]->livro.'</td>
                        <td >'.$this->list["lista1"][$a]->quantidade_vendido.'</td>
                        <td  >'.$this->list["lista1"][$a]->preco_livro.'Kz</td>
                        <td >'.$this->list["lista1"][$a]->preco_livro*$this->list["lista1"][$a]->quantidade_vendido.'Kz</td>
               </tr>';
 }
 $this->list["lista2"] = json_decode($this->list["lista2"]);
 
 for($a=0;$a<count($this->list["lista2"]);$a++)
 {
     $valor +=$this->list["lista2"][$a]->preco_livro*$this->list["lista2"][$a]->quantidade_vendido;
     $list .='  <tr>
                        <td >'.$this->list["lista2"][$a]->id.'</td>
                        <td >'.$this->list["lista2"][$a]->livro.'</td>
                        <td >'.$this->list["lista2"][$a]->quantidade_vendido.'</td>
                        <td  >'.$this->list["lista2"][$a]->preco_livro.'Kz</td>
                        <td >'.$this->list["lista2"][$a]->preco_livro*$this->list["lista2"][$a]->quantidade_vendido.'Kz</td>
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
                        <th >Venda Nº</th>
                        <th >Livro</th>
                        <th >Quantidade</th>
                        <th  >Preço/Unitário</th>
                        <th >Total pago</th>
                    </tr>
                    
                </thead>
                <tbody>
                      '.$list.'
                    </tbody>
            </table>
            <h3>Total vendido: '.$valor.'Kz;</h3>
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
