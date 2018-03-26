<?php require_once "../class/cliente.class.php"; 
session_start();
$clientes = new Cliente();

$clientes = $clientes->listar();

if(isset($_SESSION['produtosDisponiveis']) && isset($_SESSION['produtosAdicionados']) && isset($_SESSION['precoTotal'])){
  unset($_SESSION['produtosDisponiveis']);
  unset($_SESSION['produtosAdicionados']);
  unset($_SESSION['precoTotal']);
}
include_once("header.php");
?>

  <section>
  <br>
      <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?>

      <div class="text-center">
        <h1>Clientes <button class="botao-geral " data-toggle="modal" data-target="#modalCadastro" data-tooltip="tooltip" data-placement="top" title="Cadastrar Cliente"><i class="fa fa-user-plus"></i></button></h1>
      </div>
      <br>
      
      <div class="table-responsive">
        <table class="table table-striped text-center table-hover " >
          <thead class="text-center">
            <tr>
              <th class="text-center">Nome</th>
              <th class="text-center">Telefone</th>
              <th class="text-center">Razão Social</th>
              <th class="text-center">CNPJ</th>
              <th class="text-center">Inscrição estadual</th>
              <th colspan="2" class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($clientes as $cliente) { ?>

           <tr >
              <td><?php echo $cliente->nome; ?></td>
              <td><?php echo $cliente->telefone; ?></td>
              <td><?php echo $cliente->razaoSocial; ?></td>
              <td><?php echo $cliente->cnpj; ?></td>
              <td><?php echo $cliente->inscricaoEstadual; ?></td>
              <td><button class="botao-geral" data-toggle="modal" data-target="#modalExcluir" data-whatever-id="<?php echo $cliente->id; ?>" data-whatever-nome="<?php echo $cliente->nome; ?>" data-whatever-telefone="<?php echo $cliente->telefone; ?>" data-whatever-razao-social="<?php echo $cliente->razaoSocial; ?>" data-whatever-cnpj="<?php echo $cliente->cnpj; ?>" data-whatever-inscricao-estadual="<?php echo $cliente->inscricaoEstadual; ?>"><i class="fa fa-remove" ></i></button></td>
              <td><button class="botao-geral" data-toggle="modal" data-target="#modalAlterar" data-whatever-id="<?php echo $cliente->id; ?>" data-whatever-nome="<?php echo $cliente->nome; ?>" data-whatever-telefone="<?php echo $cliente->telefone; ?>" data-whatever-razao-social="<?php echo $cliente->razaoSocial; ?>" data-whatever-cnpj="<?php echo $cliente->cnpj; ?>" data-whatever-inscricao-estadual="<?php echo $cliente->inscricaoEstadual; ?>"><i class="fa fa-edit"></i></button></td>
            </tr>

            <?php } ?>
          </tbody>
        </table>
        </div>
        

        <!--MODAL CADASTRO-->
        <div class="modal fade" id="modalCadastro" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Cliente</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/cliente.do.php" method="post">
                    <div class="form-group">
                      <label for="cad-nome" class="control-label">Nome</label>
                      <input type="text" name="cad-nome" class="form-control" id="cadNome" required placeholder="Nome">
                    </div>
                    <div class="form-group">
                      <label for="cad-telefone" class="control-label">Telefone</label>
                      <input type="text" name="cad-telefone" class="form-control" id="cadTelefone" placeholder="(99)99999-9999">
                    </div>
                    <div class="form-group">
                      <label for="cad-razao-social" class="control-label">Razão Social</label>
                      <input type="text" name="cad-razao-social" class="form-control" id="cadRazaoSocial"  placeholder="RazãoSocial.LTDA">
                    </div>
                    <div class="form-group">
                      <label for="cad-cnpj" class="control-label">CNPJ</label>
                      <input type="text" name="cad-cnpj" class="form-control" id="cadCnpj" placeholder="00.000.000/0000-00">
                    </div>
                    <div class="form-group">
                      <label for="cad-inscricao-estadual" class="control-label">Inscrição Estadual</label>
                      <input type="text" name="cad-inscricao-estadual" class="form-control" id="cadInscricaoEstadual" placeholder="00000000000-00">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <!--FIM DO MODAL DE CADASTRO-->

        <!--MODAL ALTERAR-->
        <div class="modal fade" id="modalAlterar" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Alterar Cliente</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/cliente.do.php" method="post">
                    <div class="form-group">
                      <input type="hidden" name="alt-id" id="altId">
                    </div>
                    <div class="form-group">
                      <label for="alt-nome" class="control-label">Nome</label>
                      <input type="text" name="alt-nome" class="form-control" id="altNome" required >
                    </div>
                    <div class="form-group">
                      <label for="alt-telefone" class="control-label">Telefone</label>
                      <input type="text" name="alt-telefone" class="form-control" id="altTelefone" >
                    </div>
                    <div class="form-group">
                      <label for="alt-razao-social" class="control-label">Razão Social</label>
                      <input type="text" name="alt-razao-social" class="form-control" id="altRazaoSocial" >
                    </div>
                    <div class="form-group">
                      <label for="alt-cnpj" class="control-label">CNPJ</label>
                      <input type="text" name="alt-cnpj" class="form-control" id="altCnpj" >
                    </div>
                    <div class="form-group">
                      <label for="alt-inscricao-estadual" class="control-label">Inscrição Estadual</label>
                      <input type="text" name="alt-inscricao-estadual" class="form-control" id="altInscricaoEstadual" >
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <!--FIM DO MODAL DE ALTERAR-->
        
        <!--MODAL EXCLUIR-->
         <div class="modal fade" id="modalExcluir" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Excluir Cliente</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/cliente.do.php" method="post">
                    <div class="form-group">
                      <input type="hidden" name="exc-id" id="excId">
                    </div>
                    <div class="form-group">
                      <label for="exc-nome" class="control-label">Nome</label>
                      <input type="text" readonly name="exc-nome" class="form-control" id="excNome" >
                    </div>
                    <div class="form-group">
                      <label for="exc-telefone" class="control-label">Telefone</label>
                      <input type="text" readonly name="exc-telefone" class="form-control" id="excTelefone">
                    </div>
                    <div class="form-group">
                      <label for="exc-razao-social" class="control-label">Razão Social</label>
                      <input type="text" readonly name="exc-razao-social" class="form-control" id="excRazaoSocial">
                    </div>
                    <div class="form-group">
                      <label for="exc-cnpj" class="control-label">CNPJ</label>
                      <input type="text" readonly name="exc-cnpj" class="form-control" id="excCnpj">
                    </div>
                    <div class="form-group">
                      <label for="exc-inscricao-estadual" class="control-label">Inscrição Estadual</label>
                      <input type="text" readonly name="exc-inscricao-estadual" class="form-control" id="excInscricaoEstadual">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Excluir</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <!--FIM DO MODAL DE EXCLUIR-->
        

      
      
  </section>
  <footer>
    <div id="rodape">
      <p class="text-center">Desenvolvido por Júlio Liarte Diniz, 2017.</p>
    </div>  
  </footer>
    <script src="../lib/jquery-1.10.2.min.js.download"></script>
    <script src="../lib/bootstrap.min.js.download"></script>
    <script src="../lib/custom.js.download"></script>
    <script src="../lib/js/script.js"></script>
  <script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
  <script>
    $('#modalAlterar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('whatever-id')
      var nome = button.data('whatever-nome')
      var telefone = button.data('whatever-telefone') 
      var razaoSocial = button.data('whatever-razao-social')
      var cnpj = button.data('whatever-cnpj')
      var inscricaoEstadual = button.data('whatever-inscricao-estadual')

      var modal = $(this)
      modal.find('#altId').val(id)
      modal.find('#altNome').val(nome)
      modal.find('#altTelefone').val(telefone)
      modal.find('#altRazaoSocial').val(razaoSocial)
      modal.find('#altCnpj').val(cnpj)
      modal.find('#altInscricaoEstadual').val(inscricaoEstadual)
    })

    $('#modalExcluir').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('whatever-id')
      var nome = button.data('whatever-nome')
      var telefone = button.data('whatever-telefone') 
      var razaoSocial = button.data('whatever-razao-social')
      var cnpj = button.data('whatever-cnpj')
      var inscricaoEstadual = button.data('whatever-inscricao-estadual')

      var modal = $(this)
      modal.find('#excId').val(id)
      modal.find('#excNome').val(nome)
      modal.find('#excTelefone').val(telefone)
      modal.find('#excRazaoSocial').val(razaoSocial)
      modal.find('#excCnpj').val(cnpj)
      modal.find('#excInscricaoEstadual').val(inscricaoEstadual)
    })
  </script>


  

</body></html>