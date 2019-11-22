
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3> LISTA DE LIVROS A VENDA</h3>
    </div>
</div>
<div class=" base-3">
<table class="table table-striped table-bordered table-hover datatable" width="100%">
            <thead>
             <tr>
                <th>Livro</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Categoria</th>
                 <th>Edição</th>
                <th>Ano</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Prefácio</th>
                 <th>data cadastrada</th>
                <th>Editar</th>

            </tr>

            </thead>
            <tbody>
              <?php
              $this->view["list"]=json_decode($this->view["list"]);
               for($a=0;$a<count(  $this->view["list"]);$a++)
              {?>
                <tr>
                  <td id="Titulo<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->titulo?></td>
                  <td id="Autor<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->autor?></td>
                  <td id="Editora<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->editora?></td>
                  <td id="Categoria<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->categoria?></td>
                   <td id="Edicao<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->edicao?></td>
                  <td id="Ano<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->ano?></td>
                  <td id="Quantidade<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->quantidade?></td>
                  <td id="Preco<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->preco?>Kz</td>
                  <td id="Prefacio<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->prefacio?></td>
                  <td id="data<?=$this->view["list"][$a]->id?>"><?=$this->view["list"][$a]->data?></td>
                 <td>
                      <a onclick="EditarLivro(this.id);" id="<?=$this->view["list"][$a]->id?>" data-toggle="modal" data-target="#modalEditorLivro"
                    class="btn btn-primary black-sgb glyphicon glyphicon-edit"></a></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
</div>
<div class="base-3" >
    <a href="" class="btn laranja-hero branco-text" data-toggle="modal" data-target="#modalRelatorio">Consulta por data</a>
</div>
<!-- modal do relatorio -->
<?= $this->requireFile("views/biblioteca/modals/modalEditorLivro")?>

    <!-- footer -->
  </div>
    <!-- App -->
</div>
<!-- modal do autor -->
<div class="modal fade" id="modalRelatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">CONSULTA POR DATA</h4>
      </div>
        <form class="" role="form" method="get" action="">
     
          <div class="modal-footer">
              <div class="form-group col-md-12">
                  <label style="color:#000;float: left">Do dia:</label>
                  <input class="form-control" type="date" name="data" required="">
                </div>
              <div class="form-group col-md-12 option">
                  <label style="color:#000;float: left">Ate o dia:</label>
                  <input class="form-control" type="date" name="data1" required="">
              </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12">
                  CRIAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
     <script src="<?= $this->asset('datatable/js/datatables.min.js')?>"></script>
      <script src="<?= $this->asset('datatable/js/datatables.init.js')?>"></script> 
     <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
       <script src="<?= $this->asset('js/livro.js')?>"></script>
     <script>
         gerarRelatorio();
      </script>

</body>
</html>
