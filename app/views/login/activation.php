<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$this->getTitle()?></title>
    <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
   <link href="<?= $this->asset('css/buttons.css')?>" rel="stylesheet">
   <link rel="icon" href="<?= $this->asset('icones/logotipo.png') ?>" type="image/icon" />
   <style>
    body
    {
      background: url("<?= $this->asset('icones/bg.jpg') ?>");
     font-family: "CaviarDreams";
     color:#fff;
   }
     .login
     {
       
       margin:40px 20% 20px 20% !important;
       width: 60%;
       min-height:200px; 
       background:rgba(255,255,255,0.1) !important;
       padding:0px 10px 10px 10px;
       border-radius:5px; float: right
     }
     .btn-branco
   {
       background:rgba(255,255,255,0.5) !important;
       border:none;
       font-weight:bolder;
       color:#fff;
       margin-bottom:30px;
   }
   .btn-branco:hover, .btn-branco:focus
   {
       background:rgba(255,255,255,0.5) !important;
       border:none;
       color:#fff;
   }
     h1{ font-weight:bolder; font-size:18px;};
     
     @media screen and (max-width: 1100px)
     {
       .login { margin:40px auto 20px auto;width: 50%;}
     }
     @media screen and (max-width: 900px)
     {
         body{text-align:center;}
       .login { margin:40px auto 20px auto;width: 60%;}
     }
     @media screen and (max-width: 730px)
     {
       .login{margin:40px 5% 20px 5% !important;width: 90%;}
     }
   </style>
  </head>
  <body>

    <div class="login">
        <h1>A tua conta foi criada!.. mas pra teres acesso, diriga-se a biblioteca para activar a conta... Obrigado!.</h1>
        <a href="<?=$this->route("Login")?>" class="btn btn-branco col-md-12">Rectroceder</a>
    </div>
    </body>
  <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
  <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
</html>
