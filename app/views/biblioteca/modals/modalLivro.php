<!-- modal do autor -->
<div class="modal fade" id="modalAutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">CADASTRO DE AUTOR</h4>
      </div>
        <form id="AutorForm" class="" role="form" method="POST" action="<?=$this->route("PostBiblioteca/setAutor")?>">

          <div class="modal-footer">
            <div class="form-group col-md-12 ">
                <input id="titulo" type="text" class="form-control" placeholder="Escreva aqui o nome do autor"
                   name="nomeautor" value="" required >
            </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12">
                   CADASTRAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- modal da Editora -->
<div class="modal fade" id="modalEditora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">CADASTRO DE EDITORA</h4>
      </div>
        <form id="EditoraForm" class="" role="form" method="POST" action="">

          <div class="modal-footer">
            <div class="form-group col-md-12 ">
                <input id="titulo" type="text" class="form-control" placeholder="Escreva aqui o nome da editora"
                   name="nomeeditora" value="" required >
            </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12">
                   CADASTRAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!-- modal da CAtegoria -->
<div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">CADASTRO DE CATEGORIA</h4>
      </div>
        <form id="CategoriaForm" class="" role="form" method="POST" action="">

          <div class="modal-footer">
            <div class="form-group col-md-12 ">
                <input id="titulo" type="text" class="form-control" placeholder="Escreva aqui o nome da categoria"
                   name="nomecategoria" value="" required >
            </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12">
                   CADASTRAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!-- modal do Preço -->
<div class="modal fade" id="modalPreco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">CADASTRO DE PREÇARIO</h4>
      </div>
        <form id="formPreco"  class="" role="form" method="POST" action="">

          <div class="modal-footer">
            <div class="form-group col-md-12 ">
                <input id="titulo" type="number" class="form-control" placeholder="Escreva aqui o preço"
                   name="preco" value="" required>
            </div>
            <div class="form-group col-md-12">
                 <button type="submit" class="btn laranja-hero col-md-12">
                   CADASTRAR
                 </button>
            </div>
      </div>
             </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px;text-align: center;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close laranja-esc_text" >&times;</button>
      </div>
        <img  style="width: 100px;height:100px" src="<?=$this->route("assets/icones/checked.png")?>" id="imageSucesso" />
        <h3 id="Text-input" style="color:#000;">Editora Cadastrado com sucesso</h3>
        
        <button class="btn laranja-hero btn-primary close-modal col-md-12" id="#modalSucesso" >Fechar</button>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>