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
     text-align:center;
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
   input[type="text"],input[type="password"]
   {
       background:rgba(255,255,255,0.1) !important;
       color:#fff;
       border:none;
   }
   h2 {margin: 0px;}
   a{color:#fff;}
   a:hover{color:#fff;text-decoration: underline;}
   button,input[type="submit"]{width: 100%;}


   .login
     {
       width: 30%;
       margin:50px auto 50px auto;
       padding:0px 10px 10px 10px;
       border-radius:5px;
       position:relative;
       z-index:1000;
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
       .login { margin:40px auto 20px auto;width: 50%;}
     }
     @media screen and (max-width: 500px)
     {
       .login{margin:40px 5% 20px 5% !important;width: 90%;}
     }

   </style>
  </head>
  <body>

    <div class="login">
      <form class="form" id="form" role="form" method="POST" action="/">
          <div class="div-img">
            <img src="<?= $this->asset('icones/logotipo.png') ?>" alt="" />
            <h2>QueroBukar</h2>
          </div>
                       <div class="form-group">
                           <label for="email" class="">Nome de Usuário</label>
                          <input id="email" type="text" class="form-control" name="username"  palceholder="Nome de usuário" required>
                       </div>

                       <div class="form-group">
                           <label for="password" class="">Senha de usuário</label>
                               <input id="password" type="password" class="form-control" name="password" required>
                       </div>

                       <div class="form-group">
                               <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="remember" > Lembra-me a senha
                                   </label>
                           </div>
                       </div>

                       <div class="form-group">
                               <button name="submit" type="submit" class="btn btn-branco  col-md-12">
                                   Entrar
                               </button>

                               <a class=" " href="<?=$this->route("Register")?>">
                                   Não tens uma conta? <br/>Registre-se no QueroBukar...
                               </a>
                       </div>
                   </form>
    </div>
  <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
  <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
  <script type="text/javascript">

  </script>
  </body>
</html>
