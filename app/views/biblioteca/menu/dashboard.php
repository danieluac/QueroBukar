<style>
   
</style>
<div class=" black-hero base-1-lista">
     <div class="col-md-12">
            <h3>PAINEL DE ESTÁTISTICA</h3>
    </div>
</div>
<div class=" base-3">
    

    
<div class="col-md-6" id="box-grafico-pie" style="">
                <div class="panel box-v1 box-grafico">

                    <div class="col-md-12 col-sm-12 col-xs-12 text-left padding-bottom-30">
                        <h4 class="text-left" style="color:#000;font-weight: bold">VENDAS</h4>
                    </div>
                    <canvas id="GraficoPizza" class="wid" width="290%" ></canvas>   
                    <div class="circle-description">


<div class="circle-barra">
    <span class="c-b bg-cblue"></span>
    <span id="TotalVendido">Total vendido hoje: </span>
</div>
<div class="circle-barra">
    <span class="c-b bg-orange"></span>
    <span id="TotalInterno">Vendas Internas:</span>
</div>
<div class="circle-barra">
        <span class="c-b bg-bblue"></span>
        <span id="TotalExterno">Externas: </span>
</div>

</div>
 </div>
</div>
    
 <div class="col-md-6" id="box-grafico-pie" style="">
    
<div class="panel box-v1 box-grafico">

 <div class="col-md-12 col-sm-12 col-xs-12 text-left padding-bottom-30">
    <h4 class="text-left" style="color:#000;font-weight: bold">LIVROS</h4>
 </div>
                    <canvas id="GraficoPizza1" class="wid" width="290%" ></canvas>   
<div class="circle-description">

<div class="circle-barra">
        <span class="c-b bg-bblue"></span>
        <span id="MasLido">Livro mas lido: </span>
</div>

<div class="circle-barra">
    <span class="c-b bg-cblue"></span>
    <span id="MasVendido">Livro mas vendido: </span>
</div>

<div class="circle-barra">
    <span class="c-b bg-orange"></span>
    <span id="MasSolicitado">Livro mas solicitado: </span>
</div>

</div>
                    
</div>
</div>
    
</div>

    <!-- footer -->
  </div>
    <!-- App -->
</div>

    <!-- Scripts -->
    <script src="<?= $this->asset('js/jquery.min.js')?>"></script>
    
    <script src="<?= $this->asset('bootstrap/dist/js/bootstrap.min.js')?>"></script>
     <script src="<?= $this->asset('datatable/js/datatables.min.js')?>"></script>
      <script src="<?= $this->asset('datatable/js/datatables.init.js')?>"></script>
     <script src="<?= $this->asset('js/apiBiblioteca.js')?>"></script>
       <script src="<?= $this->asset('js/livro.js')?>"></script>
     <script>
         gerarRelatorio();
       // window.print();
         </script>
<script type="text/javascript">

var options = {	    responsive:true};

    $.get("<?=$this->route("Biblioteca/getGraficosVenda")?>",{venda:true},function(done)
    {
         var datas = [
        {
            value: done.total,
            color:"#f7464a",
            highlight: "#f6666a",
            label: "TOTAL em KZ:"
        },
        {
            value: done.interno,
            color: "#f39c47",
            highlight: "#e47f1c",
            label: "INTERNO:"
        },
        {
            value: done.externo,
            color: "#484b56",
            highlight: "#24262e",
            label: "EXTERNO:"
        }
    ];
    
var ctxs = document.getElementById("GraficoPizza").getContext("2d");
var PizzaChart = new Chart(ctxs).Pie(datas, options);
    
    $("#TotalVendido").empty().append("Total Vendido Hoje: "+done.total+"Kz");
    $("#TotalInterno").empty().append("Vendas Internas Hoje: "+done.interno+"Kz");
    $("#TotalExterno").empty().append("Vendas externas Hoje: "+done.externo+"Kz");
    },"json");


$.get("<?=$this->route("Biblioteca/getLivrosGrafico")?>",{Livros:true},function(done)
{
    console.log(done);
   var data = [
        {
            value: done.lido.mas,
            color:"#484b56",
            highlight: "#24262e",
            label: "Livro mas lido:"
        },
        {
            value: done.vendido.mas,
            color: "#f7464a",
            highlight: "#f6666a",
            label: "Livro mas vendido:"
        },
        {
            value: done.solicitado.mas,
            color: "#f39c47",
            highlight: "#e47f1c",
            label: "Livro mas solicitado:"
        }
    ]; 
    
    var ctxs = document.getElementById("GraficoPizza1").getContext("2d");
    var PizzaChart = new Chart(ctxs).Pie(data, options);
    
    $("#MasLido").empty().append(" LIVRO MAS LIDO: "+done.lido.livro);
    $("#MasVendido").empty().append("LIVRO MAS VENDIDO: "+done.vendido.livro);
    $("#MasSolicitado").empty().append("LIVRO MAS SOLICITADO: "+done.solicitado.livro);
        
},"json");	

</script>
</body>
</html>
