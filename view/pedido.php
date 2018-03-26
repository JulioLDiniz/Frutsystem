<?php require_once "../class/produto.class.php"; 
      require_once "../class/cliente.class.php"; 

session_start();
if(!isset($_SESSION['usuario'])){
    header("location: ../login.php");
  }
$produtos = new Produto();

if(!isset($_SESSION['produtosDisponiveis'])){
  $produtos = $produtos->listar();
  $_SESSION['produtosDisponiveis'] = $produtos;
}

$produtosDisponiveis = $_SESSION['produtosDisponiveis'];

if(!isset($_SESSION['produtosAdicionados'])){
  $produtosAdicionados = array();
}else{
  $produtosAdicionados = $_SESSION['produtosAdicionados'];
}

if(!isset($_SESSION['precoTotal'])){
  $_SESSION['precoTotal'] = 0.00;
}


?>
<!DOCTYPE html>

<!-- saved from url=(0032)https://bootswatch.com/spacelab/ -->
<html lang="en" data-livestyle-extension="available"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Clientes - Frutsystem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../lib/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../lib/custom.min.css">
    <link rel="stylesheet" href="../lib/css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" async="" src="./lib/ga.js.download"></script><script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  <script id="_carbonads_projs" type="text/javascript" src="./lib/C6AILKT.json"></script></head>
  <body>
  <header>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand">Frutsystem</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <?php if($_SESSION['usuario'] == 'Administrador'){
              echo "<li>
                   <a href='usuario.php'>Usuario</a>
                   </li>";
            }else{
              echo "<li>
              <a href='cliente.php' >Cliente</a>
            </li>
            <li>
              <a href='produto.php'>Produto</a>
            </li>
            <li>
              <a href='pedido.php'>Pedido</a>
            </li>";
            }?>
            </ul>

          <ul class="nav navbar-nav navbar-right">
            <li id="usuario-logado">Usuário Logado:<?php echo $_SESSION['usuario']?></li>
            <li><a href="../controller/valida-login.php?sair" ><span class="fa fa-sign-out"></span>Sair</a></li>
          </ul>

        </div>
      </div>
    </div>
  </header>
  <section>
  <br>
    <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?>
    <div>
      <h1 class="text-center txt-sublinhado">Efetuar Pedido</h1>
      <br>
      <h2 class="text-center">Produtos Disponíveis</h2>
    </div>
         
     
        <table class="table table-striped text-center table-responsive">
          <thead class="text-center">
            <tr>
              <th class="text-center">Descrição</th>
              <th class="text-center">Preço Unitário</th>
              <th colspan="2" class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($produtosDisponiveis as $produto) { ?>

            <tr>
              <td><?php echo $produto->descricao; ?></td>
              <td>R$ <?php echo $produto->precoUnitario; ?></td>
              <td><button class="botao-geral" data-toggle="modal" data-target="#modalInserir" data-whatever-id="<?php echo $produto->id; ?>" data-whatever-descricao="<?php echo $produto->descricao; ?>" data-whatever-precounitario="<?php echo $produto->precoUnitario; ?>" id="btn-alterar"><i class="fa fa-cart-plus"></i></button></td>
            </tr>

            <?php } ?>
          </tbody>
        </table>

        <!--TABELA DOS PRODUTOS DO CARRINHO-->
      <div>
        <h2 class="text-center">Adicionados ao Pedido  <button class="botao-geral" data-tooltip="tooltip" data-toggle="modal"  data-target="#modalFinalizarPedido" data-placement="top" title="Finalizar Pedido"><i class="fa fa-credit-card"></i></button></h2>
      </div>
        
      <div class=" table-responsive">
      
        <table class="table table-striped text-center ">
          <thead class="text-center">
            <tr>
              <th class="text-center">Descrição</th>
              <th class="text-center">Quantidade</th>
              <th class="text-center">Preço Unitário</th>
              <th class="text-center">Preço Parcial</th>
              <th colspan="2" class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php 

          if(empty($produtosAdicionados)){
            echo "<p class='text-center'>Não há Registros</p>";
          }

          foreach ($produtosAdicionados as $produto) { ?>

            <tr>
              <td><?php echo $produto->descricao; ?></td>
              <td><?php echo $produto->quantidade; ?></td>
              <td>R$ <?php echo $produto->precoUnitario; ?></td>
              <td>R$ <?php echo number_format($produto->precoParcial, 2) ?></td>
              <td><button class="botao-geral" data-toggle="modal" data-target="#modalRemover" data-whatever-id="<?php echo $produto->id; ?>" data-whatever-descricao="<?php echo $produto->descricao; ?>" data-whatever-precounitario="<?php echo $produto->precoUnitario; ?>" id="btn-alterar"><i class="fa fa-remove"></i></button></td>
            </tr>
            
            <?php } ?>
            <tr>
              <td colspan="6"><?php echo "<p>Preco Total R$".number_format($_SESSION['precoTotal'], 2)."</p>"; ?></td>
            </tr>
          </tbody>
        </table>
        
        </div>

        
        <!--MODAL INSERIR-->
        <div class="modal fade" id="modalInserir" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Inserir ao Pedido</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/pedido.do.php?movimentacao=adicionar" method="post">
                    <div class="form-group">
                      <input type="hidden" name="alt-id" id="altId">
                    </div>
                    <div class="form-group">
                      <label for="ins-descricao" class="control-label">Descrição</label>
                      <input type="text" readonly name="ins-descricao" class="form-control" id="insDescricao">
                    </div>
                    <div class="form-group">
                      <label for="ins-precoUnitario" class="control-label">Preço Unitário</label>
                      <input type="number" step="0.01" min="0.01" max="1000.00" required name="ins-precoUnitario" class="form-control" id="insPrecoUnitario">
                    </div>
                    <div class="form-group">
                      <label for="ins-quantidade" class="control-label">Quantidade</label>
                      <input type="number" step="1" min="1" max="10000" required name="ins-quantidade" class="form-control" id="insQuantidade">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Inserir</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <!--FIM DO MODAL DE INSERIR-->

        <!--MODAL REMOVER-->
        <div class="modal fade" id="modalRemover" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Remover do Pedido</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/pedido.do.php?movimentacao=remover" method="post">
                    <div class="form-group">
                      <input type="hidden" name="rem-id" id="altId">
                    </div>
                    <div class="form-group">
                      <label for="rem-descricao" class="control-label">Descrição</label>
                      <input type="text" readonly name="rem-descricao" class="form-control" id="remDescricao">
                    </div>
                    <div class="form-group">
                      <label for="rem-precoUnitario" class="control-label">Preço Unitário</label>
                      <input type="number" step="0.01" readonly name="rem-precoUnitario" class="form-control" id="remPrecoUnitario">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Remover</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <!--FIM DO MODAL DE REMOVER-->
        
        <!--MODAL FINALIZAR PEDIDO-->
        <div class="modal fade" id="modalFinalizarPedido" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Escolher Cliente</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/finalizar-pedido.do.php" method="post" target="_blank">
                    <div class="form-group">
                      <select class="form-control" name="cliente" id="cliente" required>
                      <option value="">Selecione o Cliente</option>
                        <?php $cliente = new Cliente();
                              $cliente = $cliente->listar();
                              foreach ($cliente as $value) { ?>
                                <option value="<?= $value->id ?>"><?= $value->nome ?></option>
                            <?php  }
                         ?>
                      </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button  type="submit" class="btn btn-primary" >Finalizar</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
        <!--FIM DO MODAL DE FINALIZAR PEDIDO-->

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
    $('#modalInserir').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('whatever-id')
  var descricao = button.data('whatever-descricao')
  var precoUnitario = button.data('whatever-precounitario') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#insId').val(id)
  modal.find('#insDescricao').val(descricao)
  modal.find('#insPrecoUnitario').val(precoUnitario)
})

  $('#modalRemover').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('whatever-id')
    var descricao = button.data('whatever-descricao')
    var precoUnitario = button.data('whatever-precounitario') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('#remId').val(id)
    modal.find('#remDescricao').val(descricao)
    modal.find('#remPrecoUnitario').val(precoUnitario)
  })

  </script>

</body></html>