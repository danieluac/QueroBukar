<!-- modal do autor -->
<div class="modal fade" id="ModalSolicitacoesExterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Efectuar Solicitação Externa</h4>
      </div>
        <form class="" role="form" method="POST" action="<?=$this->route("PostRequest/RequestExtern")?>">

          <div class="modal-footer">
            <div class="form-group col-md-12">
                
            </div>
            <div class="form-group col-md-12">
                <input type="number" id="idbilhete" class="form-control" name="BI" placeholder="Nº de telefone" required=""/>
            </div>
              <div class="form-group col-md-6" id="VP_EF">
              <input class="form-control" name="pri_nome" placeholder="Primeiro nome" required=""/>
            </div>
              <div class="form-group col-md-6" id="VU_EF">
              <input class="form-control" name="ult_nome" placeholder="Ultimo Nome" required=""/>
            </div>
           <div class="form-group col-md-6">
              <select  class="form-control Efeito" name="" required="">
                    <option disabled selected>Efeito:</option>
                    <option value="Compra">Venda</option>
                    <option value="Leitura">Leitura</option>
                </select>  
            </div>
            <div class="form-group col-md-6">
              <select  class="form-control LivroEfeito" name="LivroID" required="">
                    <option disabled selected>Livro:</option>
              </select>  
            </div>
              <div class="form-group col-md-6  precolivro">
                  <input class="form-control" name="" disabled="" placeholder="preço" required=""/>
            </div>
            <div class="form-group col-md-6 quantExtern">
                <input type="number" class="form-control" name="quantidade" placeholder="quantidade" required=""/>
            </div>
              <div class="form-group col-md-12">
                   <button type="submit" class="btn laranja-hero col-md-12">
                    EFECTUAR
                   </button>
              </div>
           </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<!-- modal da solicitção interna -->
<div class="modal fade" id="ModalSolicitacoesInterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Efectuar Solicitação Interna</h4>
      </div>
        <form class="formInterno" role="form" method="POST" action="<?=$this->route("PostRequest/RequestIntern")?>">

          <div class="modal-footer">
            <div class="form-group col-md-12">
                
            </div>
            <div class="form-group col-md-12">
                <input id="idprocesso" class="form-control" type="number" name="" placeholder="Nº de Processo" required=""/>
            </div> 
              <div class="form-group col-md-6 " id="alunoEf">
                  <input class="form-control"  disabled="" name="" placeholder="Nome do aluno" required=""/>
            </div>
              <div class="form-group col-md-6" id="cursoEf">
                  <input class="form-control" name="" disabled="" placeholder="Curso" required=""/>
            </div>
           <div class="form-group col-md-6">
              <select  class="form-control Efeito" name="" required="">
                    <option disabled selected>Efeito:</option>
                    <option value="Compra">Venda</option>
                    <option value="Leitura">Leitura</option>
                </select>  
            </div>
            <div class="form-group col-md-6">
              <select  class="form-control LivroEfeito" name="LivroID" required="">
                    <option disabled selected>Livro:</option>
              </select>  
            </div>
              <div class="form-group col-md-6 precolivro">
                  <input  class="form-control" disabled="" name="" placeholder="preço" required=""/>
            </div>
            <div class="form-group col-md-6 quantExtern">
                <input type="number" class="form-control" name="quantidade" placeholder="quantidade" required=""/>
            </div>
              <div class="form-group col-md-12">
                   <button type="submit" class="btn laranja-hero col-md-12">
                    EFECTUAR
                   </button>
              </div>
           </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!-- modal da solicitção Aceita -->
<div class="modal fade" id="AceitarSolicit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header black-hero">
        <button type="button" class="close laranja-esc_text" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Atender Solicitação</h4>
      </div>
        <form id="FormAtenderSoliciracao" role="form" method="POST" action>

          <div class="modal-footer">           
           <div class="form-group col-md-12">
               <label style="color:#000;float: left;">Efeito:</label>
               <select  class="form-control" id="OptionAtender" name="opcao" required="">
                    
                    <option value="Compra">Venda</option>
                    <option value="Leitura">Leitura</option>
                </select>  
            </div>
              <div id="OpcoesAtender" class="form-group col-md-12">
                  
              </div>
              <div id="TotalPagar" class="form-group col-md-12">
                  
              </div>
              <div class="form-group col-md-12">
                  <button  id="OptionAtenderSubmits" type="button" class="btn laranja-hero col-md-12">
                    EFECTUAR
                   </button>
              </div>
           </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
