<section  >
  <div class="section-line">
    <div class="left">
      <h4><?=$this->getTitle()?></h4>
    </div>
    <div class="right">
    </div>
  </div>

  <div class="panel-group " id="panel-form" >
  <div class="panel panel-default section-config" style="padding-bottom: 30px;min-height: 50px">

    <div class="sub-header">
        <a href="#13" data-toggle="collapse" data-parent="#panel-form">
          <h4>Livros Solicitados</h4>
        </a>
    </div>
    <div class=" panel-collapse collapse" id="13">
        <div class="sub-body" style="">
          <?php
          for($a=0;$a<count($this->view["solicitado"]);$a++)
          {?>
          <h5>Livro: <?=$this->view["solicitado"][$a]->livro?></h5>
          <?php } ?>
        </div>
    </div>

  </div>
  <div class="panel panel-default section-config" style="padding-bottom: 30px;">

    <div class="sub-header">
        <a href="#Info2" data-toggle="collapse" data-parent="#panel-form">
          <h4>Dados pessoais</h4>
        </a>
    </div>
    <div class=" panel-collapse collapse" id="Info2">
        <div class="sub-body" >
        <h5>Nome: <?= count($this->view["userData"])>0? $this->view["userData"][0]->pri_nome." ".$this->view["userData"][0]->ult_nome : ""?></h5>
        <h5>Curso: <?= count($this->view["userData"])>0? $this->view["userData"][0]->curso : ""?></h5>
        <h5>Nº  Precesso: <?= count($this->view["userData"])>0? $this->view["userData"][0]->processo : ""?></h5>
      </div>
    </div>

  </div>
  <div class="panel panel-default section-config" style="padding-bottom: 70px;">

    <div class="sub-header">
        <a href="#133" data-toggle="collapse" data-parent="#panel-form">
          <h4>Informações da Conta</h4>
        </a>
    </div>
    <div class=" panel-collapse collapse" id="133">
      <div class="sub-body">
      <h5>Usuário: <?= count($this->view["userData"])>0? $this->view["userData"][0]->pri_nome.".".$this->view["userData"][0]->ult_nome : ""?> 
          (<?= count($this->view["userData"])>0? $this->view["userData"][0]->processo : ""?>) </h5>
      <h5>Senha: ######### <a href="" class="btn btn-primary black-sgb">Alterar</a></h5>
      <a href="<?=$this->route("Login/logout")?>" class="btn btn-primary black-sgb col-md-12">Terminar sessão</a>
    </div>
    </div>

  </div>

</div>

</section>
