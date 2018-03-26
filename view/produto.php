<?php require_once "../class/produto.class.php"; 
session_start();
$produtos = new Produto();

$produtos = $produtos->listar();

if(isset($_SESSION['produtosDisponiveis']) && isset($_SESSION['produtosAdicionados']) && isset($_SESSION['precoTotal'])){
  unset($_SESSION['produtosDisponiveis']);
  unset($_SESSION['produtosAdicionados']);
  unset($_SESSION['precoTotal']);
}
include_once("header.php");
?>
<!--<!DOCTYPE html>

<!-- saved from url=(0032)https://bootswatch.com/spacelab/ 
<html lang="en" data-livestyle-extension="available"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Produtos - Frutsystem</title>
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
    <![endif]
  

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
  <body style="">
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
            <li>
              <a href="usuario.php">Usuario</a>
            </li>
            <li >
              <a href="cliente.php">Cliente</a>
            </li>
            <li class="active">
              <a href="produto.php">Produto</a>
            </li>
            <li>
              <a href="pedido.php">Pedido</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" ><span class="fa fa-sign-out"></span>Sair</a></li>
          </ul>

        </div>
      </div>
    </div>
  </header>-->
  <section>
  <br>
      <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?>
      <div >
        <h1 class=" text-center">Produtos <button class="botao-geral " data-toggle="modal" data-target="#modalCadastro" data-tooltip="tooltip" data-placement="top" title="Cadastrar Produto"><i class="fa fa-shopping-basket"></i></button></h1>
      </div>
      <br>
      
      
      
        <table class="table table-striped text-center ">
          <thead class="text-center">
            <tr>
              <th class="text-center">Descrição</th>
              <th class="text-center">Preço Unitário</th>
              <th colspan="2" class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($produtos as $produto) { ?>

            <tr>
              <td><?php echo $produto->descricao; ?></td>
              <td>R$ <?php echo $produto->precoUnitario; ?></td>
              <td><button  class="botao-geral" id="btn-excluir" data-toggle="modal" data-target="#modalExcluir" data-whatever-id="<?php echo $produto->id; ?>" data-whatever-descricao="<?php echo $produto->descricao; ?>" data-whatever-precounitario="<?php echo $produto->precoUnitario; ?>"><i class="fa fa-remove"></i></button></td>
              <td><button class="botao-geral" data-toggle="modal" data-target="#modalAlterar" data-whatever-id="<?php echo $produto->id; ?>" data-whatever-descricao="<?php echo $produto->descricao; ?>" data-whatever-precounitario="<?php echo $produto->precoUnitario; ?>" id="btn-alterar"><i class="fa fa-edit"></i></button></td>
            </tr>

            <?php } ?>
          </tbody>
        </table>
        
        

        <!--MODAL CADASTRO-->
        <div class="modal fade" id="modalCadastro" >
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/produto.do.php" method="post">
                    <div class="form-group">
                      <label for="cad-descricao" class="control-label">Descrição</label>
                      <input type="text" name="cad-descricao" class="form-control" id="cadDescricao" required>
                    </div>
                    <div class="form-group">
                      <label for="cad-precoUnitario" class="control-label">Preço Unitário</label>
                      <input type="number" step="0.01" min="0.01" max="10000" name="cad-precoUnitario" class="form-control" id="cadPrecoUnitario" required>
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
                  <h4 class="modal-title text-center" id="myModalLabel">Alterar Produto</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/produto.do.php" method="post">
                    <div class="form-group">
                      <input type="hidden" name="alt-id" id="altId">
                    </div>
                    <div class="form-group">
                      <label for="alt-descricao" class="control-label">Descrição</label>
                      <input type="text" name="alt-descricao" class="form-control" id="altDescricao" required>
                    </div>
                    <div class="form-group">
                      <label for="alt-precoUnitario" class="control-label">Preço Unitário</label>
                      <input type="number" step="0.01" min="0.01" max="10000" name="alt-precoUnitario" class="form-control" id="altPrecoUnitario" required>
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
                  <h4 class="modal-title text-center" id="myModalLabel">Excluir Produto</h4>
                </div>
                <div class="modal-body">
                  <form action="../controller/produto.do.php" method="post">
                    <div class="form-group">
                      <input type="hidden" name="exc-id" id="excId">
                    </div>
                    <div class="form-group">
                      <label for="exc-descricao" class="control-label">Descrição</label>
                      <input type="text" readonly="true" name="exc-descricao" class="form-control" id="excDescricao">
                    </div>
                    <div class="form-group">
                      <label for="exc-precoUnitario" class="control-label">Preço Unitário</label>
                      <input type="number" step="0.01" readonly="true" name="exc-precoUnitario" class="form-control" id="excPrecoUnitario">
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
  var descricao = button.data('whatever-descricao')
  var precoUnitario = button.data('whatever-precounitario') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#altId').val(id)
  modal.find('#altDescricao').val(descricao)
  modal.find('#altPrecoUnitario').val(precoUnitario)
})

    $('#modalExcluir').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('whatever-id')
  var descricao = button.data('whatever-descricao')
  var precoUnitario = button.data('whatever-precounitario') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('#excId').val(id)
  modal.find('#excDescricao').val(descricao)
  modal.find('#excPrecoUnitario').val(precoUnitario)
})
  </script>

</body></html>