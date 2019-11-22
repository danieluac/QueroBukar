<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->getTitle()?></title>
    <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
   <link href="<?= $this->asset('css/buttons.css')?>" rel="stylesheet">
   <link rel="icon" href="<?= $this->asset('icones/logotipo.png') ?>" type="image/icon" />
   <style media="screen">
    body{
       width:100%;
       color:#fff;
       background: url("<?= $this->asset('icones/bg.jpg') ?>");       /*rgba(242,101,34,1); */
     font-family: "CaviarDreams";
     text-align:left;
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
   input[type="text"],input[type="number"],input[type="password"],select
   {
       background:rgba(255,255,255,0.1) !important;
       color:#fff !important;
       border:none !important;
   }
   select:focus
   {
       background:rgba(255,255,255,0.1) !important;
       color:#000 !important;
       border:none !important;
   }
   h2 {margin: 0px;}
   a{color:#fff;}
   a:hover{color:#fff;text-decoration: underline;}
   button,input[type="submit"]{width: 100%;}
     .login
     {       
       width: 30%;
       min-height:500px !important;
       margin:50px auto;
       padding:0px 10px 10px 10px;
       border-radius:5px;
     }
     .login > .form
     { 
         width: 100%;
         min-height:50px;
     }
     .login > .form .div-img
     {
      width: 100%;
      text-align:center;
      padding-bottom:40px;
     }
    
     .login > .form .div-img img
     { width: 80px;height: 80px;margin-bottom: 20px}
     
     @media screen and (max-width: 1100px)
     {
       .login { margin:40px auto 20px auto;width: 40%;}
     }
     @media screen and (max-width: 900px)
     {
       .login { margin:40px auto 20px auto;width: 50%;}
     }
     @media screen and (max-width: 730px)
     {
       .login { margin:40px auto 20px auto;width: 70%;}
     }
     @media screen and (max-width: 500px)
     {
       .login{margin:40px 5% 20px 5% !important;width: 90%;}
     }

   </style>
  </head>
  <body>

    <div class="login">
        <form action="<?=$this->route("")?>" class="form" id="FormRegisterUser" role="form" method="POST">
          <div class="div-img">
            <img src="<?= $this->asset('icones/logotipo.png') ?>" alt="" />
            <h1>QueroBukar</h2>
          </div>
          <div id="err" style="width:100%;"></div>

                       <div class="form-group col-md-12">
                           <label  class="erro1">Primeiro nome:</label>
                          <input  type="text" class="form-control" name="primeiroNome" value="" required>
                       </div>
                       <div class="form-group col-md-12">
                           <label  class="erro2">Sobrenome:</label>
                          <input  type="text" class="form-control" name="sobrenome" value="" required>
                       </div>
                       <div class="form-group col-md-12">
                           <label  class="erro3">Número de Processo:</label>
                           <input  type="number" min="1" class="form-control" name="processo" value="" required>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="curso" class="erro4">Curso:</label>
                        <select id="curso" class="form-control" name="curso">
                          <option disabled="" selected="">selecione:</option>
                        </select>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="sexo" class="erro5">Sexo:</label>
                        <select id="sexo" class="form-control" name="sexo">
                          <option disabled="" selected="">selecione:</option>
                          <option value="MASCULINO">Masculino</option>
                          <option value="FEMENINO" >Femenino</option>
                        </select>
                       </div>

                       <div class="form-group col-md-12">
                           <label for="password" class="erro6">Palavra passe</label>
                          <input id="password" type="password" class="form-control" name="password" required>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="passwords" class="erro7">Confirmar palavra passe</label>
            <input id="passwords" type="password" class="form-control" name="ConfPass" required>
                       </div>

                       <div class="form-group col-md-12">
                               <div class="checkbox">
                                   <label>
            <input id="check" type="checkbox" class="" name="concordo" >
                                       Ao clicar em registrar, eu concordo com os termos de uso do QueroBukar
                                   </label>
                           </div>
                       </div>

                       <div class="form-group col-md-12">
                               <button id="submitRegisterUser" type="submit" class="btn btn-branco">
                                   Registrar-se
                               </button>

                               <a class="" href="<?=$this->route("Login")?>">
                                  Já tens uma conta? clique aqui...
                               </a>
                       </div>
                   </form>

    </div>
  <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
  <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
 
   <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
   
   <script type="text/javascript">

   getAll("<?=$this->route("Register/CourseAll?all")?>","curso");
   var d=0;
   document.getElementById("submitRegisterUser").disabled=true;

   $("#check").click(function()
   {
     if(d==1)
     {
       document.getElementById("submitRegisterUser").disabled=true; d=0;
     }else{ document.getElementById("submitRegisterUser").disabled=false; d=1; }
   });
   

    RegisterUser();
   </script>
   
  </body>
</html>
