<section>
  <div class="section-line">
    <div class="left">
      <h4> <?=$this->getTitle()?></h4>
    </div>
    <div class="right">
    </div>
  </div>
<div class="section-book">



    <div class="section-body">

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
           </div>           
        </form>

<?php  for($a=0;$a<count($this->view["list"]);$a++){?>
        <div class="section-body-public">
            <div class="sub-body">
                <div class="public-img">
    <a href="<?=$this->route("Studant/User/".str_replace(" ",".",$this->view["list"][$a]->pri_nome.".".$this->view["list"][$a]->ult_nome)."?QbId=".$this->view["list"][$a]->idusuario)?>">
          <?php if($this->view["list"][$a]->foto!=="" && $this->view["list"][$a]->foto!==" "){ ?>
                  <img src="<?= $this->route($this->view["list"][$a]->foto)?>"/>
          <?php }else{ ?>
               <img src="<?= $this->asset("icones/liceu.png")?>"/>
          <?php }?>
                </a>
                </div>
                <div class="public-title">
                    <h4><?= str_replace("}}@","", str_replace("@{{","",strip_tags($this->view["list"][$a]->titulo)))?></h4>
                  <h5>  <?=date("h:i d-m-Y", strtotime($this->view["list"][$a]->data))?></h5>
                </div>
                <div class="public-body">
                  <div class="div-border">
                      
    <?= str_replace("}}@","</code></pre>", str_replace("@{{","<pre><code>", strip_tags($this->view["list"][$a]->descricao)))?>
        
        <div class="inside-img">
            <?php if($this->view["list"][$a]->fotoForum!=="" and $this->view["list"][$a]->fotoForum!==" "){ ?>
            <img src="<?= $this->route($this->view["list"][$a]->fotoForum)?>"/>
            <?php }?>
        </div>

            </div>

            <div class="line-coment">
              <form id="FormComment<?=$this->view["list"][$a]->id?>" class="form" action="" method="post">
                <textarea name="comentario" class="form-control" rows="2" required="" placeholder="Comentar"></textarea>
                <button id="<?=$this->view["list"][$a]->id?>" type="button" class=" ButtonComment btn btn-info black-sgb" name="comment">Comentar</button>

              </form>
                <a href="#" class="ver-coment" data-target="#comment<?=$this->view["list"][$a]->id?>"><h3 id="">Ver comentarios</h3></a>
                
                <div id="comment<?=$this->view["list"][$a]->id?>" class="comments">
              <?php 
                    $coment= $this->setModel("forum/vercomentario")
                            ->where("idforum","=",$this->view["list"][$a]->id)->selects();
                    for($b=0;$b<count($coment);$b++){?>
                  <hr>
                  <div  class="public-img">
                       <?php if($coment[$b]->foto!=="" and $coment[$b]->foto!==" "){ ?>
             <img src="<?= $this->route($coment[$b]->foto)?>"/>
                    <?php }else{?>
                    <img src="<?= $this->asset('icones/liceu.png')?>"/>
                    <?php }?>
                  </div>
                  <h5><a href="<?=$this->route("Studant/User/".str_replace(" ",".",$coment[$b]->pri_nome.".".$coment[$b]->ult_nome)."?QbId=".$coment[$b]->idusuario)?>">
                    <?=$coment[$b]->pri_nome." ".$coment[$b]->ult_nome?></a></h5>
                  <p> <?= str_replace("}}@","</code></pre>", 
                          str_replace("@{{","<pre><code>", strip_tags($coment[$b]->descricao)))?>
                  </p>
                <?php } ?>
                 

<!-- finish comments -->
              </div>

            </div>

        </div>
    </div>
    <!-- Section public -->
  </div>
<?php }?>
</div>

    </div>

     <div class="circle-search">  
         <?php if($this->view["cat"]!=0){?>
       <a href="<?=$this->route("Studant/forum/".$this->view["contar"]."/".$this->view["cat"])?>" id="vermais" class="">+</a>
         <?php }else{?>
        <a href="<?=$this->route("Studant/forum/".$this->view["contar"])?>" id="vermais" class="">+</a>
         <?php }?>
    </div>
    </div>




</div>
</section>
<script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
<script src="<?= $this->asset('js/estudante.js')?>"></script>
<script>
    comentar(<?=$_SESSION["UserId"]?>);
cardLerMais(".comments",".ver-coment",300);
cardLerMais(".response",".ver-response",300);
cardLerMais(".option-link-mobile",".btn-mobile-active",300);

function getCategoria(value)
    {
        location.href=window.location.origin+"/Studant/forum/0/"+value;
    }
//window.setInterval(RefreshForum(),0);
</script>
