<style>
    a{ font-size: 16px !important;}
</style>
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>HISTÓRICO DE TRABALHO</h3>
    </div>
</div>
<div class="base-3" style="min-height: 50px;" >
    
  <a href="<?= $this->route("Relatorio/ControlVendasToday")?>" 
     class="btn black-hero branco-text glyphicon glyphicon-print"> Total vendido hoje</a>
  
  <a class="btn laranja-hero branco-text glyphicon glyphicon-print" 
     data-toggle="modal" data-target="#modalRelatorio"> Vendas Antigas</a>
    
</div>

  </div>
    <!-- App -->
</div>

<div class="modal fade" id="modalRelatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">GERAR RELATORIO DE VENDAS</h4>
      </div>
        <form class="" role="form" method="GET" action="<?= $this->route("Relatorio/ControlVendasOld")?>">
     
          <div class="modal-footer">
          <div class="form-group col-md-12">
                  <label style="color:#000;float: left">Do dia:</label>
                  <input type="date" name="date" class="form-control" required=""/>
          </div>
          <div class="form-group col-md-12">
                  <label style="color:#000;float: left">Ate o dia:</label>
                  <input type="date" name="date1" class="form-control" required=""/>
          </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12 glyphicon glyphicon-print">
                   VER RELATÓRIO
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
