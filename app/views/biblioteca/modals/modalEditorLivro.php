<!-- modal para edição do livro -->
<div class="modal fade" id="modalEditorLivro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Escolha a opção a editar</h4>
      </div>
        <form id="FormEditarLivro" class="" role="form" method="POST" action="<?=$this->route("PostBiblioteca/EditBook")?>">

          <div class="modal-footer">
            <div class="form-group col-md-12 ">
                <select id="selectOpcao" class="form-control" name="opcao" required="">
                    <option disabled selected>Selecione:</option>
                    <option value="Categoria">Categoria</option>
                    <option value="Titulo">Titulo</option>
                    <option value="Autor">Autor</option>
                    <option value="Editora">Editora</option>
                    <option value="Edição">Edição</option>
                    <option value="Ano">Ano</option>
                    <option value="Prefácio">Prefácio</option>
                    <option value="Quantidade">Quantidade</option>                   
                    <option value="Preco">Preço</option> 
                </select>               
            </div>
              <div class="form-group col-md-12 novaOpcao">
                  
              </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12">
                   Editar
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
