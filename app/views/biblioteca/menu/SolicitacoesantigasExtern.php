
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>SOLICITAÇÔES ANTERIORES FEITAS POR VISITANTES</h3>
    </div>
</div>
<div class="base-3" style="min-height: 50px;" >
</div>
<div class=" base-3">
  <table class="table table-striped table-bordered table-hover datatable" width="100%">
              <thead>
               <tr>
                  <th>Visitante</th>
                  <th>Nº de Telefone</th>
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
                    <td><?=$this->view["list"][$a]->pri_nome." ".$this->view["list"][$a]->ult_nome?></td>
                    <td><?=$this->view["list"][$a]->bilhete?></td>
                    <td><?=$this->view["list"][$a]->livro?></td>
                    <td><?=$this->view["list"][$a]->quantidade?></td>
                    <td><?= date("d-m-Y", strtotime($this->view["list"][$a]->data_solicitado))?></td>
                    <td><a data-toggle="modal" data-target="#AceitarSolicit"
                           class="btn btn-primary laranja-hero glyphicon glyphicon-saved"></a></td>
                           <td><a href="<?=$this->route("PostRequest/RemoveRequest/".$this->view["list"][$a]->id)?>"
                                 class="btn btn-primary laranja-hero glyphicon glyphicon-remove"></a></td>
                  </tr>
              <?php }?>

              </tbody>
          </table>
</div>


<!-- modal do relatorio -->
    <!-- footer -->
  </div>
    <!-- App -->
</div>

    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
     <script src="<?= $this->asset('datatable/js/datatables.min.js')?>"></script>
      <script src="<?= $this->asset('datatable/js/datatables.init.js')?>"></script>
     <script src="<?= $this->asset('js/solicitacao.js')?>"></script>
     <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
     <script>
         gerarRelatorio();
         efeitoRequest();
         </script>


</body>
</html>
