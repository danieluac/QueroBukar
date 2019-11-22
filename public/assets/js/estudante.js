

function setTable()
{
  $(".setTable").on("click",function(){//""$(".setTable").on("click", function(){
  var data = $(this).attr('id').split(":");
    alert(data[1]);
  //});
});
}

function FixedScroll()
{
    $(".header-menu").ready(function()
{
  if($(this).scrollTop()>=201)
  {
      $(".header-menu").css({

          position:"fixed",
            width:"100%",
          margin:"-200px 11% 0px 0px"
      });
  }
  if($(this).scrollTop()<=200) {
    $(".header-menu").css({
      width:"100%",
      position:"inherit",
      margin:"0px"
    });
  }
});
}
/**
 *
 * @param {type} c1
 * @param {type} c2
 * @returns {undefined}
 */
function ShowBotton(c1,c2)
{
    $(c1).on("click", function()
    {
        $(document).scrollTop(235);
        $(c2).focus();
    });
}
/**
 *
 * @returns {undefined}
 */
var funcao = function(width,classe)
{
    $(document).ready(function()
    {
       if($(this).width()<=width)
       {
           $(classe).hide();
       }else
       {
           $(classe).show();
       }
    });
};

function Refresh()
{
    funcao(999,".section-body-center-right");
    funcao(650,".section-body-left ");
    FixedScroll();
}
/* ======================== ALL CLICK ========================*/

function cardLerMais (c1,c2,st)
{
  //  $(".sobre-livro").hide();
    $(c1).hide();
    var t ="";

  //  $(".card-ler-mais").on("click",function()
    $(c2).on("click",function()
    {
        var id = $(this).attr("data-target");
        if(t=='')
        {
            t=id;
            $(id).show();
            $(id).css({float: "left"});
        }
        else
        {
            if(t==id)
            {
               $(id).hide();
               t='';
            }
            else
            {
                $(t).hide();
                $(id).show();
                t=id;
            }
        }
        var p = parseInt($(this).position().top);
        setTimeout
        (function()
        {
             $(document).scrollTop(p-st);
        },0
        );
    });
}

/* ===================== MESSAGE DEFAULT ===========*/
function MessageBox(title,type,sub,cl)
{

}
/*================= VER LIVROS ==================*/
 var livros, cont=0;
function VerLivros(user)
{

    $(document).ready(function()
    {
        setTimeout(function()
        {
            var QB = new QueroBukar();
            QB.setData
                ({
                    formD:{All:"ALL"},
                    type : "post",
                    url : window.location.origin+"/PostRequest/AllBook?ALL", time:10,
                    finished : function (data)
                    {
                        livros = data;
                        cont=cont+2;
                         var texto="";
                            $("#allCard").empty();
                       for(b=0;b<cont;b++)
                       {
                          var preco = livros[b].preco=="NÃO A VENDA"?"NÃO A VENDA":livros[b].preco+"Kz";

                            texto+='<div class="card-view"><div class="card-view-header">';
                            texto+='<img id="img:1" src="'+location.origin+'/assets/icones/htmlcss-capa.jpg">';
                            texto+='</div><div class="card-view-footer">';
                            texto+='<h4 id="text:1">'+livros[b].titulo+'   </h4>';
                            texto+='<a title="'+livros[b].titulo+'" id="'+user+':'+livros[b].id+'" onClick="requisitaLivros(this.id,this.title)" class="  btn btn-primary laranja-hero glyphicon glyphicon-share">';
                            texto+='</a> <a href="" class="  btn btn-primary black-sgb glyphicon glyphicon-star">';
                            texto+='</a> <a href="" class="  btn btn-primary laranja-hero glyphicon glyphicon-share-alt">';
                            texto+='</a> <br/>';
                            texto+='<a href="#" class="btn btn-primary black-sgb card-ler-mais"  data-target="#ler'+livros[b].id+'">ler mais...';
                            texto+='</a> <div id="ler'+livros[b].id+'" class="sobre-livro">';
                            texto+='<h5>Preço:'+preco+'</h5>';
                            texto+='<h5>Edição:'+livros[b].edicao+'º</h5>';
                            texto+='<h5>Ano de lançamento:'+livros[b].ano+'</h5>';
                            texto+=' <h5>Editora:'+livros[b].editora+'</h5>';
                            texto+='<h5>Categoria:'+livros[b].categoria+'</h5>';
                            texto+='<h5>Autor:'+livros[b].autor+'</h5>';
                            texto+='<h5>Lido: 30</h5>';
                            texto+='<h5 style="text-align: justify">Prefácio:'+livros[b].prefacio+'</h5>';
                            texto+='</div> </div> </div>';

                $("#allCard").append(texto);
                       }

                    },
                    failed : function()
                    {
                        console.log("sasas falha....");
                    }
                });
        },1000);
    });
    $("#vermais").click(function()
    {

        var b=cont;

         cont=cont+2;
          var texto="";
              $("#allCard").empty();
         if(cont>=livros.length){

             for(a=0;a<=livros.length;a++)
             {

                 if(cont===livros.length)
                 {
                     if(b<cont)
                     {
                         b=cont-2;

                        for(b;b<cont;b++)
                        {
                          var preco = livros[b].preco=="NÃO A VENDA"?"NÃO A VENDA":livros[b].preco+"Kz";

                            texto+='<div class="card-view"><div class="card-view-header">';
                            texto+='<img id="img:1" src="'+location.origin+'/assets/icones/htmlcss-capa.jpg">';
                            texto+='</div><div class="card-view-footer">';
                            texto+='<h4 id="text:1">'+livros[b].titulo+'   </h4>';
                            texto+='<a title="'+livros[b].titulo+'" id="'+user+':'+livros[b].id+'" onClick="requisitaLivros(this.id,this.title)" class="  btn btn-primary laranja-hero glyphicon glyphicon-share">';
                            texto+='</a> <a href="" class="  btn btn-primary black-sgb glyphicon glyphicon-star">';
                            texto+='</a> <a href="" class="  btn btn-primary laranja-hero glyphicon glyphicon-share-alt">';
                            texto+='</a> <br/>';
                            texto+='<a href="#" class="btn btn-primary black-sgb card-ler-mais"  data-target="#ler'+livros[b].id+'">ler mais...';
                            texto+='</a> <div id="ler'+livros[b].id+'" class="sobre-livro">';
                            texto+='<h5>Preço:'+preco+'</h5>';
                            texto+='<h5>Edição:'+livros[b].edicao+'º</h5>';
                            texto+='<h5>Ano de lançamento:'+livros[b].ano+'</h5>';
                            texto+=' <h5>Editora:'+livros[b].editora+'</h5>';
                            texto+='<h5>Categoria:'+livros[b].categoria+'</h5>';
                            texto+='<h5>Autor:'+livros[b].autor+'</h5>';
                            texto+='<h5>Lido: 30</h5>';
                            texto+='<h5 style="text-align: justify">Prefácio:'+livros[b].prefacio+'</h5>';
                            texto+='</div> </div> </div>';

                            $("#allCard").append(texto);
                        }
                     }
                     return 0;
                 }
                  cont = cont-1;
             }
         }else
         {

            for(b;b<cont;b++)
            {
                var preco = livros[b].preco=="NÃO A VENDA"?"NÃO A VENDA":livros[b].preco+"Kz";

                texto+='<div class="card-view"><div class="card-view-header">';
                texto+='<img id="img:1" src="'+location.origin+'/assets/icones/htmlcss-capa.jpg">';
                texto+='</div><div class="card-view-footer">';
                texto+='<h4 id="text:1">'+livros[b].titulo+'   </h4>';
                texto+='<a title="'+livros[b].titulo+'" id="'+user+':'+livros[b].id+'" onClick="requisitaLivros(this.id,this.title)" class="  btn btn-primary laranja-hero glyphicon glyphicon-share">';
                texto+='</a> <a href="" class="  btn btn-primary black-sgb glyphicon glyphicon-star">';
                texto+='</a> <a href="" class="  btn btn-primary laranja-hero glyphicon glyphicon-share-alt">';
                texto+='</a> <br/>';
                texto+='<a href="#" class="btn btn-primary black-sgb card-ler-mais"  data-target="#ler'+livros[b].id+'">ler mais...';
                texto+='</a> <div id="ler'+livros[b].id+'" class="sobre-livro">';
                texto+='<h5>Preço:'+preco+'</h5>';
                texto+='<h5>Edição:'+livros[b].edicao+'º</h5>';
                texto+='<h5>Ano de lançamento:'+livros[b].ano+'</h5>';
                texto+=' <h5>Editora:'+livros[b].editora+'</h5>';
                texto+='<h5>Categoria:'+livros[b].categoria+'</h5>';
                texto+='<h5>Autor:'+livros[b].autor+'</h5>';
                texto+='<h5>Lido: 30</h5>';
                texto+='<h5 style="text-align: justify">Prefácio:'+livros[b].prefacio+'</h5>';
                texto+='</div> </div> </div>';

                $("#allCard").append(texto);
            }
          }
    });
}
// ====================== SOLICITAÇÕES ========================

function requisitaLivros(e,title)
{

    $("#modalRequestBooking").modal("show");

    $(".title-book").empty().append(title);
    $("#SolQuant").val("");
     document.getElementById("SolQuant").autofocus=true;


    $("#SubSol").click(function()
           {
                  var Q = new QueroBukar();
                  var id = e.split(":");
                Q.setData
                ({
                    formD:{idusuario:id[0],LivroID:id[1], quantidade:$("#SolQuant").val()},
                    type : "post",
                    url : window.location.origin+"/PostRequest/RequestInternJson", time:100,
                    finished : function (data)
                    {
                      console.log(data);
                      if(data.val==="success")
                      {
                        $("#modalRequestBooking").modal("hide");
                        $("#modalSuccess").modal("show");
                      }else
                      {
                       $("#modalRequestBooking").modal("hide");
                       $("#modalFailed").modal("show");
                      }
                      setInterval(function(){location.reload();},5000);

                    },
                    failed : function()
                    {
                       $("#modalRequestBooking").modal("hide");
                       $("#modalFailed").modal("show");
                       setInterval(function(){location.reload();},5000);
                    }
                });
           });
}
function comentar(user)
{
    $(".ButtonComment").click(function()
    {        
        var id=this.id;
        $.post(location.origin+"/PostRequest/Commentation",
        {comentario:document.getElementById("FormComment"+this.id).comentario.value, idusuario:user,idforum:this.id},
        function(done)
        {
            console.log(done);
            $("#comment"+id).empty();
            for(a=0;a<done.length;a++)
            {
                var img= done[a].foto!==""?done[a].foto:"assets/icones/liceu.png";
                var texto=' <hr><div  class="public-img">';
                texto+='<img src="'+location.origin+"/"+img+'"/></div>';
                texto+='<h5><a href="'+location.origin+"/Studant/User/"+done[a].pri_nome+" "+done[a].ult_nome+"?QbId="+done[a].idusuario+'">'+done[a].pri_nome+" "+done[a].ult_nome+'</a></h5>';
                texto+='<p>'+done[a].descricao+'</p>';

                $("#comment"+id).prepend(texto.replace("@{{","<pre><code>").replace("}}@","</pre></code>"));
                
             }
           
        },"json").fail(function(){
            alert("falha");
        });
        
         $("#FormComment"+this.id+" textarea").val("");
    });
    
}