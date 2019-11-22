<style>
    a{ font-size: 16px !important;}
</style>
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>ACTIVAR CONTA DE ALUNO</h3>
    </div>
</div>
<div class="base-3" style="min-height: 50px;" >
 
  
</div>
<div class=" base-3">
  <table class="table table-striped table-bordered table-hover datatable" width="100%">
              <thead>
               <tr>
                  <th>Aluno</th>
                  <th>Nº de Processo</th>
                  <th>Curso</th>
                  <th>Estado</th>
                  <th>Activar</th>
              </tr>

              </thead>
              <tbody>
                <?php
                $this->view["list"]=json_decode($this->view["list"]);
                 for($a=0;$a<count(  $this->view["list"]);$a++)
                {?>
                  <tr>
                    <td><?=$this->view["list"][$a]->pri_nome." ".$this->view["list"][$a]->ult_nome?></td>
                    <td><?=$this->view["list"][$a]->processo?></td>
                    <td><?=$this->view["list"][$a]->curso?></td>                           
                    <td><a class="btn btn-danger"><?=$this->view["list"][$a]->estado?></a></td>
                    <td><a href="<?=$this->route("PostBiblioteca/ActivarContaAluno/".$this->view["list"][$a]->idusuario)?>"
                        class="btn btn-success">ACTIVAR</a></td>
                  </tr>
              <?php }?>

              </tbody>
          </table>
</div>

  </div>
    <!-- App -->
</div>

    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
     <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
     <script src="<?= $this->asset('js/livro.js')?>"></script>
     <script src="<?= $this->asset('datatable/js/datatables.min.js')?>"></script>
      <script src="<?= $this->asset('datatable/js/datatables.init.js')?>"></script>
     <script>         
         
         </script>
 
      <script type="text/javascript">
     
      </script>

</body>
</html>
