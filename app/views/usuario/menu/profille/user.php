<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="">

    <title><?= $this->getTitle() ?></title>

    <!-- Styles -->
    <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('datatable/css/datatables.min.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/buttons.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/usuario.css') ?>" rel="stylesheet">
    <link href="<?= $this->asset('css/mediaQ-A.css') ?>" rel="stylesheet">
    <link href="<?= $this->asset('css/sweetalert.min.css') ?>" rel="stylesheet">

     <link rel="icon" href="<?= $this->asset('icones/logotipo.png')?>" type="image/icon" />

      <!-- Scripts -->
      <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
      <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
      <script src="<?= $this->asset('js/sweetalertantigo.min.js')?>"></script>

</head>
<body>
    <header>

      <div class="header-menu">
        <form class="section-form" role="form" method="GET" action="">
          <div class="form-group col-md-12 ">
              <input  type="search" name="search" class="form-control section-form-input"
              style="text-align:center;" placeholder="<?=$this->view["placeholder"]?>" />
         </div>

        </form>

          <nav>
            <div class="nav-menu">
              <a href="<?=$this->route("Studant/profille")?>" title="Perfil">
              <div class="menu-item <?= $this->extra["menuP"]?"activo":""?>">
                  <img src="<?= $this->asset('icones/college.png')?>">
              </div>
            </a>
            <a href="<?=$this->route("Studant/forum")?>" title="Fórum">
            <div class="menu-item <?= $this->extra["menuF"]?"activo":""?>">
                <img src="<?= $this->asset('icones/books-1.png')?>">
            </div>
          </a>
          <a href="<?=$this->route("Studant/book")?>" title="livros">
          <div class="menu-item <?=$this->extra["menuB"]?"activo":""?>">
              <img src="<?= $this->asset('icones/books.png')?>">
          </div>
        </a>
        <a href="<?=$this->route("Studant/config")?>" title="Configurações">
        <div class="menu-item <?=$this->extra["menuC"]?"activo":""?>">
            <img src="<?= $this->asset('icones/conf.png')?>">
        </div>
      </a>
            </div>
          </nav>

      </div>

    <div class="header-header" style="background:url('<?=$this->asset("icones/1.jpg")?>');">
      <div class=" resp-img" >
          <?php if($this->view["userFoto"]!=="" and $this->view["userFoto"]!==" "){ ?>
         <img src="<?= $this->route($this->view["userFoto"])?>">
          <?php }else{?>
            <img src="<?= $this->asset('icones/liceu.png')?>">
          <?php }?>
         
      </div>
    </div>


    </header>
    <section style="text-align: center;width: 100%; padding: 20px 10px 10px 10px;">
        <h3><?= count($this->view["userData"])>0? $this->view["userData"][0]->pri_nome." ".$this->view["userData"][0]->ult_nome : ""?></h2>
        <h4>(<?= count($this->view["userData"])>0? $this->view["userData"][0]->sexo : ""?>)</h2>
        <h3>Estudante do curso médio técnico de <?= count($this->view["userData"])>0? $this->view["userData"][0]->curso : ""?></h2>
    </section>
