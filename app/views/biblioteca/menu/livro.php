<style>
.progress
{
  position: relative;
  z-index: 999999 !important;
}
</style>
<div class=" laranja-hero base-1">
     <div class="col-md-12">
            <h2>Bem vindo</h2>
            <span>Ao painel de livros <br/>
        Actualize o estado do sistema nas opções</span>
    </div>
        <div class="col-md-12">
       <img src="<?= $this->asset('icones/grafico.png')?>">
       </div>
</div>
<div class="  base-2">
    <span href="" class="col-md-5 laranja-hero left">
      <a href="<?= $this->route("Biblioteca/listagem-de-livro") ?>" style="display:block">
        <div>
            <img src="<?= $this->asset('icones/livros.png')?>"/>
            <h2 id="listaLivro">0</h2>
        </div>
         LIVROS NÃO A VENDA </a>
    </span>
    <span href="" class="col-md-5 black-sgb left">
      <a href="<?= $this->route("Biblioteca/livro-avenda") ?>" style="display:block">
        <div>
            <img src="<?= $this->asset('icones/livros.png')?>"/>
            <h2 id="listaLivroVenda">0</h2>
        </div>
      LIVROS A VENDA</a>
    </span>
    <span href="" class="col-md-5 laranja-hero right">
      <a href="#" style="display:block">
        <div>
            <img src="<?= $this->asset('icones/livros.png')?>"/>
            <h2><?=$this->view["contadorLivrosRoubados"]?></h2>
        </div>
        LIVROS EM FALTA</a>
    </span>
    <span href="" class="col-md-5 black-sgb left">
      <a href="#" style="display:block">
        <div>
            <img src="<?= $this->asset('icones/livros.png')?>"/>
            <h2>#</h2>
        </div>
        ########## </a>
    </span>
    <span href="" class="col-md-5 laranja-hero left">
      <a href="#" style="display:block">
        <div>
            <img src="<?= $this->asset('icones/livros.png')?>"/>
            <h2 id="">#</h2>
        </div>
        #########  </a>
    </span>
    <span href="" class="col-md-5 black-sgb right">
      <a href="<?=$this->route("Biblioteca/Work-History")?>" style="display:block">
        <div>
            <img src="<?= $this->asset('icones/livros.png')?>"/>
            <h2 id="HB">@</h2>
        </div>
        HISTÓRICO DE TRABALHO </a>
    </span>
</div>
<!-- second -->
<div class=" base-3">
    <div class="base-3-1">
        <a href="" class="col-md-5 cizento-w left" data-toggle="modal" data-target="#modalAutor">
           <img src="<?= $this->asset('icones/lapisLaranja.png')?>">
           <div class="col-md-12 black-sgb">
                   ADICIONAR AUTOR
           </div>
       </a>
      <a href="" class="col-md-5 cizento-w right"  data-toggle="modal" data-target="#modalEditora">
            <img src="<?= $this->asset('icones/lapisLaranja.png')?>">
           <div class="col-md-12 laranja-hero">
           ADICIONAR EDITORA
           </div>
       </a>
        <a href="" class="col-md-5 cizento-w left"  data-toggle="modal" data-target="#modalCategoria">
           <img src="<?= $this->asset('icones/lapisLaranja.png')?>">
           <div class="col-md-12 laranja-hero">
           ADICIONAR CATEGORIA
           </div>
       </a>
      <a href="" class="col-md-5 cizento-w right"   data-toggle="modal" data-target="#modalPreco">
       <img src="<?= $this->asset('icones/lapisLaranja.png')?>">
           <div class="col-md-12 black-sgb">
           ADICIONAR PREÇÁRIO
           </div>
       </a>
    </div>

    <div class=" base-3-2 cizento-w">

       <form action="<?= $this->route("PostBiblioteca/setLivro?post=?")?>" id="FormLivro" class="" role="form" method="POST"  enctype="multipart/form-data">
            <div class="form-group col-md-12 ">
              <label class="error1" style="color:#000">Titulo do livro:</label>
            <input id="titulo" type="text" class="form-control" placeholder="Escreva aqui o titulo"
                   name="titulo" value="">
          </div>
           <div class="form-group col-md-6">
             <label for="Autor" style="color:#000">Selecione o Autor:</label>
               <select style="height:108px;overflow-x: scroll " id="Autor"  class="form-control" name="autor[]" multiple  >
                    <option disabled selected></option>
                </select>
          </div>
           <div class="form-group col-md-6">
             <label for="Edito" style="color:#000">Selecione a Editora:</label>
               <select id="Edito" class="form-control" name="editora" >
                    <option disabled selected></option>
                </select>
          </div>
          <div class="form-group col-md-6">
             <label for="categ" style="color:#000">Selecione a Categoria:</label>
              <select id="categ" class="form-control" name="categoria" >
                   <option disabled selected></option>
               </select>
         </div>
           <div class="form-group col-md-6">
              <label for="ano" style="color:#000">Ano de lançamento:</label>
               <input id="ano" type="number" class="form-control" placeholder="Ano de lançamento"
                    name="ano" >
          </div>
            <div class="form-group col-md-6 ">
              <label for="" style="color:#000">Quantidade:</label>
            <input id="quant" type="number" class="form-control" placeholder="Escreva a quantidade de exemplar"
                   name="quantidade" value="" >
          </div>
          <div class="form-group col-md-6 ">
            <label for="" style="color:#000">ISBN do livro:</label>
          <input id="isbn" type="number" class="form-control" placeholder="Escreva aqui o isbn"
                 name="isbn" value="">
        </div>
          <div class="form-group col-md-6">
             <label for=""  style="color:#000">Selecione a edição:</label>
             <input id="edicao" type="number" class="form-control" placeholder="Escreva aqui a edição ou volume"
                    name="edicao" value="">
         </div>
         <div class="form-group col-md-6">
            <label for="pre" style="color:#000">Selecione o preço:</label>
             <select id="pre" class="form-control" name="preco"  >
               <option disabled selected></option>
              </select>
        </div>
        <div class="input-field col-md-6 ">
          <label for="" style="color:#000">Codigo da pratileira:</label>
        <input id="codigo" type="text" class="form-control" placeholder="Escreva aqui o codigo da platileira"
               name="codigo" value="" >
      </div>
           <div class="form-group col-md-12">
             <label for="" style="color:#000">Prefácio:</label>
                    <textarea name="prefacio" class="form-control" rows="3" placeholder="Escreva o prefácio" ></textarea>
           </div>
           <div class="form-group col-md-12 ">
            <!-- <label for="file" style="color:#000">Carregar uma foto:</label> -->
           <input id="file" type="file" name="fileBook[]" class="form-control" style="display:none;"  >
         </div>
           <div id="error" class="col-md-12"></div>
          <div class="form-group col-md-12">
            <button id="SubmitBook" type="submit" class="btn btn-primary laranja-hero  col-md-12">
              CADASTRAR O LIVRO
            </button>
                        </div>
                    </form>
    </div>
</div>
<!-- Modal -->
<?= $this->requireFile("views/biblioteca/modals/modalLivro")?>
<!-- /.modal -->
<!-- jjjjj -->
</div>
    <!-- App -->
</div>
    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>   
    <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
      <script src="<?= $this->asset('js/livro.js')?>"></script>
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
   
     <script> 
RegisterBook();
      </script>
      <?php if(isset($_GET["XSQADEQBWSVBDRSA"])){?>
      <script type="text/javascript">
          MessageBox("Livro cadastrado com sucesso");     
      </script>
      <?php }?>
</body>
</html>
