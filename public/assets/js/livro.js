/*==== BIBLIOTECA ===== */
Counted(window.location.origin+"/PostBiblioteca/CountBook","listaLivro",10);
Counted(window.location.origin+"/PostBiblioteca/CountBookVenda","listaLivroVenda",10);
getAll(window.location.origin+"/PostBiblioteca/getAutor","Autor",1500);
setAll(window.location.origin+"/PostBiblioteca/setAutor","AutorForm",500,
{
  fun:function()
  {
    $("#AutorForm :text").val("");
    $("#modalAutor").modal("hide");
    MessageBox("Autor cadastrado com sucesso...",""+location.origin+"/assets/icones/emoji1.png");
    getAll(window.location.origin+"/PostBiblioteca/getAutor","Autor",10);
  }
});

getAll(window.location.origin+"/PostBiblioteca/getCategoria","categ",500);
setAll(window.location.origin+"/PostBiblioteca/setCategoria","CategoriaForm",500,
{
  fun:function()
  {
    $("#CategoriaForm :text").val("");
    $("#modalCategoria").modal("hide");
    MessageBox("Categoria cadastrada com sucesso...",""+location.origin+"/assets/icones/emoji1.png");
    getAll(window.location.origin+"/PostBiblioteca/getCategoria","categ",10);
  }
});
getAll(window.location.origin+"/PostBiblioteca/getEditora","Edito",1000);
setAll(window.location.origin+"/PostBiblioteca/setEditora","EditoraForm",500,
{
  fun:function()
  {
    $("#EditoraForm :text").val("");
    $("#modalEditora").modal("hide");
    MessageBox("Editora cadastrada com sucesso...",""+location.origin+"/assets/icones/emoji1.png");
    getAll(window.location.origin+"/PostBiblioteca/getEditora","Edito",10);
  }
});
getAll(window.location.origin+"/PostBiblioteca/getPreco","pre",1000);
setAll(window.location.origin+"/PostBiblioteca/setPreco","formPreco",500,
{
  fun:function()
  {
    $("#formPreco :text").val("");
    $("#modalPreco").modal("hide");
    MessageBox("Preço cadastrado com sucesso...",""+location.origin+"/assets/icones/emoji1.png");
    getAll(window.location.origin+"/PostBiblioteca/getPreco","pre",10);
  }
});

/****************** ************/

function RegisterBook()
{
document.getElementById("SubmitBook")
.addEventListener("click",function(o)
{
  o.preventDefault();
  var f = document.getElementById("FormLivro");
  $("#error").hide();
  if(f.titulo.value.length<4)
  {
    $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Titulo do livro deve ser preenchido</div>');
  }else{

    if($("#Autor").val().length<1)
    {
      $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Autor deve ser preenchido</div>');
    }else {
      if(f.editora.value.length<1)
      {
        $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Editora deve ser preenchido</div>');
      }else{
        if(f.categoria.value.length<1)
        {
          $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Categoria deve ser preenchido</div>');
        }else{
          if(f.ano.value.length<4)
          {
            $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Campo ano de lançamento de ver preenchido</div>');
          }else{
            if(f.quantidade.value<1)
            {
              $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Quantidade de exemplar deve ser preenchido</div>');
            }else{
              if(f.isbn.value.length<6)
              {
                $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* isbn deve ser preenchido</div>');
              }else{
                if(f.codigo.value.length<2)
                {
                  $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Codigo de Org. deve ser preenchido</div>');
                }else{
                  if(f.prefacio.value.length<5)
                  {
                    $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Prefácio deve ser preenchido</div>');
                  }else
                  {
                    if(f.preco.value.length<1)
                    {
                      $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Preço deve ser preenchido</div>');
                    }else{
                      if(f.edicao.value.length<1)
                      {
                        $("#error ").show().empty().append('<div class="alert alert-danger" role="alert">* Edição deve ser preenchido</div>');
                      }else{
                        $("#FormLivro").append('<input  type="hidden" name="subForm" value="true" />');
                        $("#FormLivro").submit();
                      }
                    }

                  }
                }
              }
            }
          }
        }
      }
    }
  }
});
}


/**
 *  função editor de livro
 * @param {type} id
 * @returns {undefined}
 */
function EditarLivro(id)
{
    $(this).click(function()
    {
       //$("#modalEditorLivro").modal("show");
    });
    $("#selectOpcao").change(function()
    {
        var valor = document.getElementById("selectOpcao").value;
        var idlivro = '<input type="hidden" name="idlivro" value="'+id+'"/>';
        if(valor==="Titulo")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Titulo"+id).html()+'"/>';
            $(".novaOpcao").html(idlivro+'<input type="text" class="form-control" placeholder="Escreva o novo Titulo" name="titulo" value="" required autofocus>');
        }else if(valor==="Categoria")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Categoria"+id).html()+'"/>';
            $(".novaOpcao").html(idlivro+' <select id="categ" class="form-control" name="categoria" > <option disabled selected></option> </select>');
            getAll(window.location.origin+"/PostBiblioteca/getCategoria","categ",100);
        }else if(valor==="Ano")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Ano"+id).html()+'"/>';
             $(".novaOpcao").html(idlivro+'<input type="number" class="form-control" placeholder="Escreva o ano" name="lancamento" value="" required autofocus>');
        }else if(valor==="Edição")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Edicao"+id).html()+'"/>';
             $(".novaOpcao").html(idlivro+'<input type="number" class="form-control" placeholder="Escreva a edição" name="edicao" value="" required autofocus>');
        }else if(valor==="Prefácio")
        {
            idlivro += '<textarea rows="3" name="" class="form-control" disabled>'+$("#Prefacio"+id).html()+'</textarea>';
             $(".novaOpcao").html(idlivro+'<textarea class="form-control" placeholder="Escreva o novo Prefácio" name="prefacio" value="" required autofocus></textarea>');
        }else if(valor==="Quantidade")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Quantidade"+id).html()+'"/>';
             $(".novaOpcao").html(idlivro+'<input type="number" class="form-control" placeholder="Escreva a quantidade" name="quantidade" value="" required autofocus>');
        }else if(valor==="Autor")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Autor"+id).html()+'"/>';
            $(".novaOpcao").html(idlivro+'<select style="height:108px" id="Autor"  class="form-control" name="autor[]" multiple  ><option disabled selected></option> </select>');
            getAll(window.location.origin+"/PostBiblioteca/getAutor","Autor",100);
        }
        else if(valor==="Editora")
        {
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+$("#Editora"+id).html()+'"/>';
            $(".novaOpcao").html(idlivro+' <select id="Edito" class="form-control" name="editora" ><option disabled selected></option></select>');
            getAll(window.location.origin+"/PostBiblioteca/getEditora","Edito",100);
        }else if(valor==="Preco")
        {
            var preco =typeof $("#Preco"+id).html()==="undefined"?"NÃO A VENDA": $("#Preco"+id).html();
            idlivro += '<input type="text" name="" class="form-control" disabled value="'+preco+'"/>';
            $(".novaOpcao").html(idlivro+' <select id="pre" class="form-control" name="preco" ><option disabled selected></option></select>');
            getAll(window.location.origin+"/PostBiblioteca/getPreco","pre",100);
        }
    });
}
function gerarRelatorio ()
{
    //alert("dende");
   $('#gerarPor').on('change', function()
   {
       var value = document.getElementById("gerarPor").value;
       if(value==1)
       {
           $('.option').html('<input type="date" class="form-control" placeholder="apartir de" name="inicio" value="" required autofocus> <input type="date" class="form-control" placeholder="apartir de" name="inicio" value="" required autofocus>');
       }
           if(value==2)
           {
                $('.option').html(' <input id="titulo" type="text" class="form-control" placeholder="Escreva aqui o nome do autor" name="nomeautor" value="" required autofocus> ');
           }
            if(value==3)
            {
                 $('.option').html(' <input id="titulo" disabled="" type="text" class="form-control" name="nomeautor" value="AAA_PADRÂO" required autofocus> ');
            }
   });
}

/* ===================== MESSAGE DEFAULT ===========*/
function MessageBox(title)
{
 $("#Text-input").empty().text(title);
 $("#modalSucesso").modal("show");
$(".close-modal").click(function()
{
    $(this.id).modal("hide");
});
 
}
