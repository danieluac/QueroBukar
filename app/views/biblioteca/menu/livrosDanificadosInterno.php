
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>LIVROS FRATURADOS POR ALUNOS</h3>
    </div>
</div>
<div class="base-3" style="min-height: 50px;" >
  <a href="<?=$this->route("Biblioteca/Request-Book")?>" class="btn laranja-hero branco-text" >Voltar</a>
</div>
<div class=" base-3">
  <table class="table table-striped table-bordered table-hover datatable" width="100%">
              <thead>
               <tr>
                  <th>Aluno</th>
                  <th>Nº de Processo</th>
                  <th>Livro</th>
                   <th>data utilizada</th>
                   <th>hora utitlizada</th>
                   <th>data devolvida</th>
                   <th>hora devolvida</th>
                  <th>Funcionario</th>
                   <th>Observação</th>
                  <th>Estado</th>
                  <th>Devolver</th>
                 
              </tr>

              </thead>
              <tbody>
                <?php
                $this->view["list"]=json_decode($this->view["list"]);
                 for($a=0;$a<count(  $this->view["list"]);$a++)
                {?>
                  <tr>
                    <td><?=$this->view["list"][$a]->pri_nome_aluno." ".$this->view["list"][$a]->ult_nome_aluno?></td>
                    <td><?=$this->view["list"][$a]->processo_aluno?></td>
                    <td><?=$this->view["list"][$a]->livro?></td>
                    <td><?= date("d-m-Y", strtotime($this->view["list"][$a]->data_lida)) ?></td>
                    <td><?= date("H:i:s", strtotime($this->view["list"][$a]->hora_lida))?></td>
                    <td><?= date("d-m-Y", strtotime($this->view["list"][$a]->data_devolvida)) ?></td>
                    <td><?= date("H:i:s", strtotime($this->view["list"][$a]->hora_devolvida))?></td>   
                    <td><?=$this->view["list"][$a]->pri_nome_funcionario." ".$this->view["list"][$a]->ult_nome_funcionario?></td>
                     <td><?=$this->view["list"][$a]->obs?></td>
                    <td ><a class="btn btn-danger"><?=$this->view["list"][$a]->estado?></a></td>                          
                   <td><a id="<?=$this->view["list"][$a]->id?>"  data-toggle="modal" data-target="#modalDevolver" onclick="DevolverLivro(this.id);"
                                 class="btn btn-primary laranja-hero glyphicon glyphicon-save"></a></td>
                  </tr>
              <?php }?>

              </tbody>
          </table>
</div>
<div class="base-3" >
    <a href="" class="btn laranja-hero branco-text" data-toggle="modal" data-target="#modalRelatorio">Consulta por data</a>
</div>
<!-- modal do relatorio -->
<?= $this->requireFile("views/biblioteca/modals/modalRelatorio")?>
<?= $this->requireFile("views/biblioteca/modals/modalDevolverLivro")?>
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
