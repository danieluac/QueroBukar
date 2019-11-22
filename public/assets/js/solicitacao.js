
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
function MessageBoxFail(title)
{
 $("#Text-input1").empty().text(title);
 $("#modalFail").modal("show");
$(".close-modal").click(function()
{
    $(this.id).modal("hide");
});
 
}

// ====================== SOLICITAÇÕES ========================
function efeitoRequest()
{
    var dadoselecionados;
    $(".Efeito").change(function(){
        var Qb = new QueroBukar();
      if(this.value==="Compra")
      {
        $(".precolivro").empty().append('<input disabled class="form-control" placeholder="Preço" />');
        Qb.setData({
            formD:{id:"all"},
            type : "get",
            url : window.location.origin+"/PostBiblioteca/getLivroVenda", time:100,
            finished : function (data)
            {
                dadoselecionados = data;
              $(".LivroEfeito").empty().append('<option value="" disabled selected>Livro:</option>');
              $(".quantExtern").empty().append('<input type="number" class="form-control" name="quantidade" placeholder="quantidade" />');
              for(a=0;a<data.length;a++)
              {
               {$(".LivroEfeito").append('<option value="'+data[a].id+'" >'+data[a].titulo+'</option>');}
              }
            }
        });
      }else if(this.value==="Leitura")
      {
        $(".precolivro").empty().append('<input disabled class="form-control" placeholder="Preço" />');
        Qb.setData({
            formD:{id:"all"},
            type : "get",
            url : window.location.origin+"/PostBiblioteca/getLivro", time:100,
            finished : function (data)
            {
              dadoselecionados = data;
              $(".LivroEfeito").empty().append('<option value="" disabled selected>Livro:</option>');
              $(".quantExtern").empty().append('<input type="text" class="form-control" value="Quantidade: 1" disabled/>');
              $(".quantExtern").append('<input type="hidden" name="quantidade" value="1" />');
              for(a=0;a<data.length;a++)
              {
               {$(".LivroEfeito").append('<option value="'+data[a].id+'" >'+data[a].titulo+'</option>');}
              }
            }
        });
      }
    });
    $(".LivroEfeito").change(function()
    {
        var preco;
        for(A=0;A<dadoselecionados.length;A++)
        {
            if(this.value===dadoselecionados[A].id)
            {
             preco =dadoselecionados[A].preco==="NÃO A VENDA"?"NÃO A VENDA" : dadoselecionados[A].preco+"Kz";
             $(".precolivro").empty().append('<input disabled class="form-control" value="'+preco+'" />');
             return 0;
            }
        }
    });
    $("#idprocesso").change(function()
    {
         var Qb = new QueroBukar();
        Qb.setData({
            formD:{id:this.value},
            type : "get",
            url : window.location.origin+"/PostBiblioteca/getAluno", time:100,
            finished : function (data)
            {
              if( data.length !==0)
              {
                $("#alunoEf").empty().append('<input type="hidden" class="form-control" name="idusuario" value="'+data[0].idusuario+'" required=""/>');
                $("#alunoEf").append('<input class="form-control" value="'+data[0].pri_nome+" "+data[0].ult_nome+'"  disabled required=""/>');
                $("#cursoEf").empty().append('<input class="form-control" value="'+data[0].curso+'"  disabled required=""/>');
              }else
              {
                $("#alunoEf").empty().append('<input class="form-control" value=""  disabled required=""/>');
                $("#cursoEf").empty().append('<input class="form-control" value=""  disabled required=""/>');
              }

            }
        });
    });

    $("#idbilhete").change(function()
    {
        var Qb = new QueroBukar();
        Qb.setData({
            formD:{id:this.value},
            type : "get",
            url : window.location.origin+"/PostBiblioteca/getVisitante", time:100,
            finished : function (data)
            { console.log(data);
                if( data.length !==0)
                {
                  $("#VP_EF").empty().append('<input type="hidden" class="form-control" name="idusuario" value="'+data[0].usuario+'" required=""/>');
                  $("#VP_EF").append('<input class="form-control" value="'+data[0].pri_nome+'"  disabled required=""/>');
                  $("#VU_EF").empty().append('<input class="form-control" value="'+data[0].ult_nome+'"  disabled required=""/>');
                }else
                {
                  $("#VP_EF").empty().append('<input placeholder="Primeiro nome" class="form-control" name="pri_nome" value=""   required=""/>');
                  $("#VU_EF").empty().append('<input placeholder="Segundo nome" class="form-control" name="ult_nome" value=""   required=""/>');
                }
            }
        });
    });

}

function AtenderSolicitacao(id,title)
{
     id= id.split(":");
     if(id[4]>1)
        $("#OpcoesAtender").empty().append('<label style="color:#000;float:left">Quantidade:</label><input type="number" name="quantidade" autofocus="" class="form-control" id="idQuant"  value="'+parseInt(id[1])+'"/>');
    else
        $("#OpcoesAtender").empty().append('<label style="color:#000;float:left">Quantidade:</label><input disabled type="number" name="quantidade" class="form-control"  value="1"/><input type="hidden" name="quantidade"   value="1"/>');

    $("#OpcoesAtender").append('<input type="hidden" name="idsolicitacao" class="form-control"  value="'+id[0]+'"/>');
    $("#OpcoesAtender").append('<input type="hidden" name="url" class="form-control"  value="'+id[2]+'"/>');
    OptionAtender(id[4],id[3],id[1]);
    TotalAPagar(id[3]);
    document.getElementById("FormAtenderSoliciracao").name=""+title.split(":")[1]+"/"+title.split(":")[2]+"/"+title.split(":")[0];

}
function OptionAtender(preco,valor,quant)
{
    $("#OptionAtender").val("");
    document.getElementById("OptionAtenderSubmits").disabled=true;
    $("#OptionAtender").change(function()
    {
        if(this.value==="Compra")
        {
            if(preco<2)
            {
                document.getElementById("OptionAtenderSubmits").disabled=true;
            }else
            {
                document.getElementById("OptionAtenderSubmits").disabled=false;

            }
        }
        if(this.value==="Leitura")
        {
            if(preco>1)
            {
                document.getElementById("OptionAtenderSubmits").disabled=true;
            }else
            {
                 document.getElementById("OptionAtenderSubmits").disabled=false;
            }
        }
    });
}
function TotalAPagar(preco)
{
    $("#idQuant").focus(function()
    {
       $("#TotalPagar").empty().append('<label style="color:#000;float:left">Total a pagar:</label><input disabled class="form-control"  value="'+this.value*preco+'Kz"/>');
    });
    $("#idQuant").change(function()
    {
       $("#TotalPagar").empty().append('<label style="color:#000;float:left">Total a pagar:</label><input disabled class="form-control"  value="'+this.value*preco+'Kz"/>');
    });

}
function DevolverLivro(id)
{
    document.getElementById("SubDevol").disabled=true;
    $(".optionDevolver").empty().append('<input type="hidden" name="idleitura" value="'+id+'" />');
    $("#SelectDEstado").change(function()
    {
        document.getElementById("SubDevol").disabled=false;
    });
}

/**
 * metodo que faz o tratamento das solicitações
 * @returns {undefined}
 */
PostRequests();
function PostRequests()
{

      $("#OptionAtenderSubmits").click(function(e)
      {
            e.preventDefault();
            form = $("#FormAtenderSoliciracao").serialize();
            url = document.getElementById("FormAtenderSoliciracao").action;
            var q = new QueroBukar();
            q.setData
            ({ formD:form, type : "post", url : ""+location.origin+"/PostRequest/EffectRequest", time:10,
                finished : function (data)
                {
                  $("#AceitarSolicit").modal("hide");

                  $("#FormAtenderSoliciracao select").val("");
                  if(data.val===true)
                  {
                     var link = $("#FormAtenderSoliciracao").attr("name");
                      if(data.venda===true)
                      {
                          $("#printF").html('<a href="'+window.location.origin+"/Relatorio/Factura/"+link+'" class=" btn black-sgb btn-primary col-md-12"  >Imprimir Factura</a>');
                            MessageBox(data.text);
                            
                          $(".close-modal").click(function(){ location.reload(); });
                      }else
                      {
                           MessageBox(data.text);
                        $(".close-modal").click(function(){ location.reload(); });
                      }
                  }else{
                      MessageBoxFail(data.text);
                      $(".close-modal").click(function(){ location.reload(); });
                  }
                },
                failed : function()
                {
                     MessageBoxFail("Não foi possível atender a solicitação");
                      $(".close-modal").click(function(){ location.reload(); });                 
                }
            });
      });
}
