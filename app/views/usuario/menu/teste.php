<?php
//print_r($_COOKIE);
//setcookie("TESTECOOKY",$e,mktime(10,50,5,12,30,2020));
//  setcookie("TESTEtmp","vvvvvvv");
//  $this->header("QueroBukar - Painel");
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
     <link href="<?= $this->asset('datatable/css/datatables.min.css')?>" rel="stylesheet">
     <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
     <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>

<script>
//var get = $.get('<?=$this->route("PostBiblioteca/setJson")?>',
//{json :"session"})
//.done(function(data)
//{
//  console.log(data);
//});
/*
var json = $.getJSON('<?=$this->route("PostBiblioteca/setJson")?>',
{json :"session"})
.done(function(data)
{
  console.log(data);
});
*
var post = $.post('<?=$this->route("PostBiblioteca/setJson")?>',
{json :"session"})
.done(function(data)
{
  console.log(data);
},"xml");
*/


</script>
<style>
.prog
{
  width: 200px;
  height: 20px;
  margin: 50px;
  box-shadow: inset 0px 0px 1px #aaa;
  border-radius: 2px;
  float: left;
}
.prog > .prog-line
{
  height: 20px;
  background-color: green;
  transition: width 0.1s ease;
  width: 0%;
  text-align: center;
  max-width: 100%;
  border-radius: 2px;
  color:white;
  font-size: 14px;
}
</style>
   </head>
   <body>
<form id="form" class="" action="" method="post" enctype="multipart/form-data">
  <input id="file" class="form-control" type="file" name="file">
  <input id="text" class="form-control" type="text" name="texto">
  <input id="submit" type="submit" class="btn btn-success" name="name" value="Enviar">
</form>
<div id="" class="prog">
<div class="prog-line">

</div>
</div>
   </body>
   <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
   <script type="text/javascript">

   document.getElementById('submit').addEventListener("click",function(e)
   {
     e.preventDefault();
     var f = $("#form").serialize();
     var qb = QueroBukar;
     qb.setData
     ({
       formD: f,
       type : "post",
       url : "http://QueroBukar.dev:443/PostBiblioteca/setJson",
       finished : function (data)
       { console.log(data); },
       failed : function()
       {
         console.log("Não foi possivel se comunicar com o servidor");
       },
       progress : function()
       {
         progressBar(5);
       }
     });
   });
   </script>
 </html>
