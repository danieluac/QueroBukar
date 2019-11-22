/**
*@name QueroBukar (http://QueroBukar.com)
*
* @AUTHOR: Antonio Cordeiro (AC)
*
* @GITHUB: https://www.github.com/daniel-u-ac
*
* @EMAIL: antoniocordeiro228@gmail.com
* Copyright 2017 ++ QUeroBukar
* this api is propriety (c) Artisan Startup
*/
/**
 * 
 * @returns {QueroBukar}
 */
var QueroBukar = function()
{
  var getUrl,getFormData,opcoes;


  getFormData = function (source)
  {
    if(opcoes.type==="post" || opcoes.type==="Post")
      {
        $.post(getUrl,source, function( _response ) {
          if(typeof opcoes.finished === "function")
          { setTimeout(function(){opcoes.finished(_response);},opcoes.time); }
        }, "json").fail(function(){
            if(typeof opcoes.failed === "function")
            {opcoes.failed();}
        }).always(function(){
            if(typeof opcoes.progress === "function")
            {opcoes.progress();}
        });
      }else {
        if(opcoes.type==="get" || opcoes.type==="Get")
        {
          $.get(getUrl,source, function( _response ) {
              if(typeof opcoes.finished === "function")
              { setTimeout(function(){opcoes.finished(_response);},opcoes.time); }
          }, "json").fail(function(){
              if(typeof opcoes.failed === "function")
              {opcoes.failed();}
          }).always(function(){
              if(typeof opcoes.progress === "function")
              {opcoes.progress();}
          });
        }else{}
      }
  };
  this.setData = function(opcao)
  {
    opcoes = opcao;
    if(opcoes.url !== undefined)
    {
      getUrl =opcoes.url;
    }
    if(opcoes.formD !== undefined)
    {
      getFormData(opcoes.formD);
    }
  };
};

function setAll(url,Id,time,f)
{
  $("#"+Id).submit(function(e)
  { e.preventDefault();
      var form = $("#"+Id).serialize();
      var q = new QueroBukar();
      q.setData({ formD:form, type : "post", url : ""+url, time:time,
        finished : function (data)
        {
          if(typeof f.fun ==="function")
          {
              f.fun();
          }
        },
        failed : function()
        {
          console.log("Não foi possivel se comunicar com o servidor");
        }
      });
  });
}
function getAll(url,Id,time)
{
  var q = new QueroBukar();
  q.setData({ formD:{ALL: "All"}, type : "get", url : ""+url, time:time,
    finished : function (data)
    {
      $("#"+Id).empty().append('<option value="" disabled selected>Selecione abaixo:</option>');
      for(a=0;a<data.length;a++)
      {$("#"+Id).append('<option value="'+data[a].id+'" >'+data[a].nome+'</option>');}
    },
    failed : function()
    {
      console.log("Não foi possivel se comunicar com o servidor");
    }
  });
}
function Counted(url,Id,time)
{
  var Qb = new QueroBukar();
  Qb.setData({ formD:{ALL: "All"}, type : "get", url : ""+url, time:time,
    finished : function (data)
    {
      $("#"+Id).empty().append(''+data.counted);
    },
    failed : function()
    {
      console.log("Não foi possivel se comunicar com o servidor");
    }
  });
}
function RegisterUser()
{
  document.getElementById('submitRegisterUser')
  .addEventListener("click",function(e)
  {
    e.preventDefault();
    var f = document.getElementById("FormRegisterUser");
    if(f.primeiroNome.value.length<3)
    { $(".erro1").empty().append("*Preencha o primeiro nome:"); }else {
      if(f.sobrenome.value.length<3)
      { $(".erro2").empty().append("*Preencha o sobrenome:"); }else {
        if(f.processo.value.length<5)
        { $(".erro3").empty().append("*Preencha o processo:");}else{
          if(f.curso.value.length<1)
          { $(".erro4").empty().append("*Preencha o curso:"); }else {
            if(f.sexo.value.length<1)
            { $(".erro5").empty().append("*Preencha o sexo:"); }else {
              if(f.password.value.length<5)
              {$(".erro6").empty().append("*Palavra-passe muito curta:");}else{
                  if(f.password.value!==f.ConfPass.value)
                {$(".erro7").empty().append("*Palavra-passe diferente:");}else{
                      document.getElementById("FormRegisterUser").action=window.location.origin+"/Register/CreateUser";
                      $("#FormRegisterUser").submit();

                }
              }
            }
          }
        }
      }
    }

  });
}
/*
=============================================================  ============
===================  =================== 0================= ===============
======== ==========================================  ======================
======================== ====================================== ===========
============================= SECTION STUDANT =============================

*/
function getBook()
{
  var Qb = new QueroBukar();
  Qb.setData({
    formD:{id:"all"},
    type : "get",
    url : window.location.origin+"/Studant/getBooks", time:100,
    finished : function (data)
    {
      console.log(data);
        //MessageBox(data,"success","");
    },
    failed : function()
    {
      MessageBox(window.location.origin+"/Studant/getBooks",""+location.origin+"/assets/icones/emoji2.png");
    }
  });
}
