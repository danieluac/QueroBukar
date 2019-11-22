
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>LIVROS VENDIDOS HOJE AOS ALUNOS</h3>
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
                   <th>Curso</th>
                  <th>Livro</th>
                   <th>Quantidade vendido</th>
                   <th>Preço/Unidade</th>
                  <th>Total Pago</th>                  
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
                    <td><?=$this->view["list"][$a]->curso?></td>
                    <td><?=$this->view["list"][$a]->livro?></td>
                    <td><?=$this->view["list"][$a]->quantidade_vendido?></td>
                    <td><?=$this->view["list"][$a]->preco_livro?>Kz</td>
                    <td><?=$this->view["list"][$a]->preco_livro*$this->view["list"][$a]->quantidade_vendido?>Kz</td>
                   
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
