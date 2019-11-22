<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="123">

    <title><?= $this->getTitle()?></title>

    <!-- Styles -->
     <link href="<?= $this->asset('bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/buttons.css')?>" rel="stylesheet">
    <link href="<?= $this->asset('css/nav.index.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= $this->asset('icones/logotipo1.png') ?>" type="image/icon" />
</head>

<body>
    <header>

		<video class="video-elemen" preload="auto" autoplay="true" loop="loop" muted="muted" poster="training.gif">
				<source src="<?= $this->asset('videos/library.mp4') ?>" type="video/mp4">
		</video>

		<div class="video-overlay"></div>

		<div class="video-components">

			<div class="logo hidden-xs col-md-2 ">
					 <img src="<?= $this->asset('icones/logotipo.png') ?>">
			</div>
			<div class="col-xs-10 logo  visible-xs">
					 <img src="<?= $this->asset('icones/logotipo.png')?>">
			</div>


		</div>
		<div class="introduction col-md-12" >
			<div >
				<h1 class="hidden-xs">Acadêmico
				</h1>
					<br/>
				<span class="col-xs-12">Sistema Bibliotécario
				</span>
				<p class="hidden-xs">
					Este é um site para os estudantes do Instituto Nacional de telecomunicações,
				 	para pesquisas e solicitações dos Livros da biblioteca
				</p>
			</div>
				 <a class="btn btn-primary btnBookTree btn-flow" data-toggle="modal" data-target="#Modallogin">Faça o Login</a>
		</div>
	</header>

<!-- Modal - Login -->
<div class="modal fade" id="Modallogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content col-md-12">
      <div class="modal-body">
       <form class="form-horizontal" role="form" method="POST" action="<?= $this->route('biblioteca')?>">

                        <div class="form-group">
                            <label for="email" class="col-md-12 control-label">Nome de Usuário</label>

                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-12 control-label">Senha de usuário</label>

                            <div class="col-md-10 col-md-offset-1">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" > Lembra-me a senha
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-success  col-md-12">
                                    Entrar
                                </button>

                                <a class="btn btn-link" href="">
                                    Esqueceu a Senha?
                                </a>
                            </div>
                        </div>
                    </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<div class=" container-index">
	<section class="col-md-12 section-1 ">

		<div class=" col-md-1"></div>
			<article class="col-md-4">

				<h4>Nossos Objectivos</h4>

				<h5>Curabitur sed eros id dui gravida varius sit amet a purus Sed eu lacus.</h5>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud </p>


				<a class=" btn btn-flow">Ler mais</a>

			</article>
			<div class="col-md-2"></div>
			<article class="col-md-4">

				<h4>Como Acessar</h4>

				<h5>Curabitur sed eros id dui gravida varius sit amet a purus Sed eu lacus.</h5>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud </p>

				<a class=" btn btn-flow">Ler mais</a>

			</article>
		<div class="col-md-1"></div>

	</section>

		<section class=" col-md-12 section-2">

			<div class="col-md-1"></div>

				<article class="col-md-2 ">

					<img src="<?= $this->asset('icones/config.png')?>">

					<h5>Configurações</h5>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore. </p>

				</article>
				<div class="col-md-1"></div>
				<article class="col-md-2 ">

					<img src="<?= $this->asset('icones/login.png')?>">

					<h5>Login</h5>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud </p>

				</article>
				<div class="col-md-1"></div>
				<article class="col-md-2 ">

					<img  src="<?= $this->asset('icones/livro.png')?>">

					<h5>Livros</h5>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud </p>

				</article>

			<div class="col-md-1"></div>

		</section>



</div>
    <footer class="col-md-12">
			<h3>&copy; Biblioteca do Itel - <?= date('Y') ?></h3>

		</footer>

    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
</body>
</html>
