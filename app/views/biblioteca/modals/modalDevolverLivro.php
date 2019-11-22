<!-- modal do autor -->
<div class="modal fade" id="modalDevolver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Devolver o Livro</h4>
      </div>
        <form class="" role="form" method="POST" action="<?=$this->route("PostRequest/UpdateLeitura")?>">
     
          <div class="modal-footer">
              <div class="form-group col-md-12">
                  <select id="SelectDEstado"  class="form-control" name="estado" required="">
                <option disabled="" selected="">Estado</option>
                <option value="BOM">BOM</option>
                <option value="FRATURADO">FRATURADO</option>
                <option value="ROUBADO">ROUBADO</option>
                </select>
          </div>
              <div class="form-group col-md-12">
                  <textarea class="form-control" name="obs" required="" placeholder="Observação" rows="3"></textarea>
              </div>
              <div class="form-group col-md-12 optionDevolver">
                  
              </div>
            <div class="form-group col-md-12">
                <button id="SubDevol" type="submit" class="btn laranja-hero col-md-12">
                  CRIAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>