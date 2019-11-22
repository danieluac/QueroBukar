<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="querobukar" content="">
    <title><?= $this->getTitle() ?></title>
    <!-- Styles -->
    <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('datatable/css/datatables.min.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/buttons.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/biblioteca.css') ?>" rel="stylesheet">
    <link href="<?= $this->asset('css/mediaQ-B.css') ?>" rel="stylesheet">
     <link rel="icon" href="<?= $this->asset('icones/logotipo.png')?>" type="image/icon" />
     
     <script src="<?= $this->asset('js/Chart.min.js')?>"></script>

</head>
<body >
    <div id="app" class="app">
        <nav class=" nav-employee">
                    <!-- Branding Image -->
                    <a class="navbar-img" style="">
                        <div class="logo-employee">
                         <img src="<?= $this->asset('icones/logotipo.png')?>">
                         </div>
                    </a>
        </nav>
    <div class="employee-painel" >

        <div class="painel-left">
            <a title="SAIR DO SISTEMA" href="<?= $this->route("Login/logout?QbId=SKDKASK&ASJCCZDe=ASKAMD") ?>" class="col-md-12 " >
            <img src="<?= $this->asset('icones/off.png')?>">
            </a>
            <a title="MENU ESTATISTICA" href="<?= $this->route("Biblioteca/dashboard") ?>" class="col-md-12 <?=isset($this->view["activeDash"])?"active":""?>">
                  <img src="<?= $this->asset('icones/graphic.png')?>">
             </a>
            <a title="MENU LIVRO" href="<?= $this->route("Biblioteca/painel-de-livro") ?>" class="col-md-12 <?=isset($this->view["activep"])?"active":""?>">
                  <img src="<?= $this->asset('icones/livros.png')?>">
             </a>
           <!-- <a href="" class="col-md-12">
                  <img src="<?= $this->asset('icones/busca.png')?>">
             </a> -->
            <a title="MENU SOLICITAÇÃO" href="<?= $this->route("Biblioteca/Request-Book") ?>" class="col-md-12 <?=isset($this->view["activeS"])?"active":""?>">
                  <img src="<?= $this->asset('icones/brilho.png')?>">
             </a>
            <a href="<?= $this->route("Biblioteca/Settings") ?>" class="col-md-12 <?=isset($this->view["activeD"])?"active":""?>">
                  <img src="<?= $this->asset('icones/definicoes.png')?>">
             </a>
    </div>
    </div>
    <div class=" col-md-10 painel-right ">
