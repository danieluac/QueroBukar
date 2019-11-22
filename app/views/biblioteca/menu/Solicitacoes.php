
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>PAINEL DE SOLICITAÇÕES FEITAS POR ALUNOS</h3>
    </div>
</div>
<div class="base-3" style="min-height: 50px;" >
  <a href="<?= $this->route("Biblioteca/RequestBookExtern")?>" class="btn black-hero branco-text">Gerir Solicitações externas</a>
  <a href="" class="btn laranja-hero branco-text" data-toggle="modal" data-target="#ModalSolicitacoesInterna">Criar Solicitação interna</a>
</div>
<div class=" base-3">
  <table class="table table-striped table-bordered table-hover datatable" width="100%">
              <thead>
               <tr>
                  <th>Aluno</th>
                  <th>Nº de Processo</th>
                  <th>Curso</th>
                  <th>Livro</th>
                   <th>Quant. Solicitado</th>
                   <th>Data Solicitada</th>
                  <th>Atender</th>
                  <th>Cancelar</th>
              </tr>

              </thead>
              <tbody>
                <?php
                $this->view["list"]=json_decode($this->view["list"]);
                 for($a=0;$a<count(  $this->view["list"]);$a++)
                {?>
                  <tr>
                    <td><?=$nome = $this->view["list"][$a]->pri_nome." ".$this->view["list"][$a]->ult_nome?></td>
                    <td><?= $processo = $this->view["list"][$a]->processo?></td>
                    <td><?=$this->view["list"][$a]->curso?></td>
                    <td><?=$this->view["list"][$a]->livro?></td>
                    <td><?=$this->view["list"][$a]->quantidade?></td>
                    <td><?= date("d-m-Y", strtotime($this->view["list"][$a]->data_solicitado))?></td>
                    <td><a id="<?=$this->view["list"][$a]->id.":".$this->view["list"][$a]->quantidade.":Request-Book:".$this->view["list"][$a]->precolivro.":".$this->view["list"][$a]->idpreco?>
                           " onclick="AtenderSolicitacao(this.id,this.title);" 
                           data-toggle="modal" data-target="#AceitarSolicit" title="<?=$this->view["list"][$a]->id.":".$nome.":".$processo?>"
                           class="btn btn-primary laranja-hero glyphicon glyphicon-saved"></a></td>
                           
                           <td><a href="<?=$this->route("PostRequest/RemoveRequest/".$this->view["list"][$a]->id)?>"
                                 class="btn btn-primary laranja-hero glyphicon glyphicon-remove"></a></td>
                  </tr>
              <?php }?>

              </tbody>
          </table>
</div>
<div class="base-3" style="min-height: 50px;" >
  <a href="<?=$this->route("Biblioteca/BookOcupadoInterno")?>" class="btn laranja-hero branco-text" >Livros Ocupados pelos alunos</a>
  <a href="<?=$this->route("Biblioteca/BookVendidoIntern")?>" class="btn black-hero branco-text" >Livros Vendidos aos alunos</a>
  <a href="<?=$this->route("Biblioteca/DanificatedIntern")?>" class="btn laranja-hero branco-text" >Livros Danificados pelos alunos</a>
</div>

<!-- modal do relatorio -->
<?= $this->requireFile("views/biblioteca/modals/modalSolicitacoes")?>
    <!-- footer -->
  </div>
    <!-- App -->
</div>
<div class="modal fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px;text-align: center;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close laranja-esc_text" >&times;</button>
      </div>
        <img  style="width: 100px;height:100px" src="<?=$this->route("assets/icones/checked.png")?>" id="imageSucesso" />
        <h3 id="Text-input" style="color:#000;">Editora Cadastrado com sucesso</h3>
        <div id="printF"></div>
        <button class="btn laranja-hero btn-primary close-modal col-md-12" id="#modalSucesso" >Fechar</button>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modalFail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px;text-align: center;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close laranja-esc_text" >&times;</button>
      </div>
        <img  style="width: 100px;height:100px" src="<?=$this->route("assets/icones/cancel.png")?>" id="imageSucesso" />
        <h3 id="Text-input1" style="color:#000;">Editora Cadastrado com sucesso</h3>
        
        <button class="btn laranja-hero btn-primary close-modal col-md-12" id="#modalSucesso" >Fechar</button>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
     <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
     <script src="<?= $this->asset('js/solicitacao.js')?>"></script>
     <script src="<?= $this->asset('datatable/js/datatables.min.js')?>"></script>
      <script src="<?= $this->asset('datatable/js/datatables.init.js')?>"></script>
     <script>
         
         efeitoRequest();
         
         $(document).ready(function()
    {
        
    });
         </script>
 
      <script type="text/javascript">
     
      </script>

</body>

</html>
