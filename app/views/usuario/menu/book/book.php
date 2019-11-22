<script></script>

<section>
  <div class="section-line">
    <div class="left">
      <h4> <?=$this->getTitle()?></h4>
    </div>
    <div class="right">
    </div>
  </div>
<div  class="section-book">

    <div id="moveScrol"  class="section-body">

        <div class="section-body-right">
             <form class="" role="form" method="GET" action="">
              <input type="hidden" name="idcategoria" value="Programação"/>
            <div class="form-group col-md-12 ">

                <select onchange="getCategoria(this.value)" class="form-control" name="categoriasBook">
                    <option disabled="" selected="">Selecione a categorias:</option>
                 <?php
                for($a=0;$a<count($this->view["categoria"]);$a++){?>

                    <option value="<?=$this->view["categoria"][$a]->id?>"><?=$this->view["categoria"][$a]->nome?></option>

                <?php }?>
                </select>
                  <h4 style="margin-top:10px"><?=$this->view["QuantidadeLivro"]?> livros disponiveis</h5>
           </div>
        </form>
            <div id="allCard">
            <?php
                for($a=0;$a<count($this->view["books"]);$a++){?>
            <div class="card-view">
                <div class="card-view-header">
                     <img id="img:1" src="<?= $this->asset('icones/bg.jpg')?>">
                </div>
                <div class="card-view-footer">
                    <h4 id="text:1">
                        <?= $this->view["books"][$a]->titulo ?>
                    </h4>
                    <a title="<?=$this->view["books"][$a]->titulo?>" id="<?= $_SESSION["UserId"].":".$this->view["books"][$a]->id?>"
                       onClick="requisitaLivros(this.id,this.title)" class="  btn btn-primary laranja-hero glyphicon glyphicon-share">
                    </a>
                     <a href="" class="  btn btn-primary black-sgb glyphicon glyphicon-star">
                    </a>
                    <a href="" class="  btn btn-primary laranja-hero glyphicon glyphicon-share-alt">
                    </a>
                     <br/>
                     <a href="#" class="btn btn-primary black-sgb card-ler-mais"  data-target="#ler<?= $this->view["books"][$a]->id ?>">ler mais...
                    </a>
                     <div id="ler<?= $this->view["books"][$a]->id ?>" class="sobre-livro">
                         <h5>Preço:  <?= $this->view["books"][$a]->preco=="NÃO A VENDA"?"NÃO A VENDA":$this->view["books"][$a]->preco."Kz" ?></h5>
                         <h5>Edição:  <?= $this->view["books"][$a]->edicao ?>º</h5>
                         <h5>Ano de lançamento:  <?= $this->view["books"][$a]->ano ?></h5>
                         <h5>Editora:  <?= $this->view["books"][$a]->editora ?></h5>
                         <h5>Categoria:  <?= $this->view["books"][$a]->categoria ?></h5>
                         <h5>Autor:<?=json_decode($this->setModel("biblioteca/viewlivro")->where("id","=",$this->view["books"][$a]->id)->getAutorLivro())[0]->autor?>  </h5>
                         <h5>Lido: 30</h5>
                         <h5 style="text-align: justify">Prefácio:  <?= $this->view["books"][$a]->prefacio ?></h5>
                     </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>

    </div>

     <div class="circle-search">
         <?php if($this->view["cat"]!=0){?>
       <a href="<?=$this->route("Studant/book/".$this->view["contar"]."/".$this->view["cat"])?>" id="vermais" class="">+</a>
         <?php }else{?>
        <a href="<?=$this->route("Studant/book/".$this->view["contar"])?>" id="vermais" class="">+</a>
         <?php }?>
    </div>

</div>
<style media="screen">
.button-modal-link
{
  margin:3px 1px 3px 1px !important;
}
</style>

<!-- modal do autor -->
<div class="modal fade" id="modalRequestBooking"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header " style="border-bottom:none !important;">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title title-book" id="myModalLabel">SSSS</h4>
      </div>
        <form class="" role="form" method="POST" action="">

          <div class="modal-footer">
              <div class="form-group col-md-12">
                  <input id="SolQuant" type="number" class="form-control" name="" placeholder="Quantidade a solicitar" required=""/>
          </div>
            <div class="form-group col-md-12">
                <button id="SubSol" type="button" class="btn btn-primary laranja-hero" style="width: 100%">
                  SOLICITAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade modalrelod" id="modalSuccess"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <img  src="<?= $this->asset('icones/emoji1.png')?>">
        <p>Diriga-se em 10 minutos a biblioteca a fim de obter o livro solicitado</p>
        <a href="" class="btn btn-primary laranja-hero">Fechar</a>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade " id="modalFailed"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <img  src="<?= $this->asset('icones/emoji2.png')?>">
        <p>Não foi possivel efectuar a solicitação...</p>
        <a href="" class="btn btn-primary laranja-hero">Fechar</a>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<style>
    .modal-dialog
    {
        text-align: center;
    }
   #modalSuccess > .modal-dialog .modal-content img,
    #modalFailed > .modal-dialog .modal-content img
   {
       width: 150px;
       height: 150px;
       margin-top: 10px;
   }
   #modalSuccess > .modal-dialog .modal-content a,
   #modalFailed > .modal-dialog .modal-content a
   {
       margin-bottom: 10px;
   }
</style>
</section>
<script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
<script src="<?= $this->asset('js/estudante.js')?>"></script>
<script>

    cardLerMais(".sobre-livro",".card-ler-mais",300);
    //VerLivros(<?= $_SESSION["UserId"]?>);
    //window.setInterval(RefreshBook(),0);

    function getCategoria(value)
    {
        location.href=window.location.origin+"/Studant/book/0/"+value;
    }
</script>
