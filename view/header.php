<?php 
  if(!isset($_SESSION['usuario'])){
    header("location: ../login.php");
  }
  if(isset($_SESSION['produtosDisponiveis'])){
    unset($_SESSION['produtosDisponiveis']);
  }
  if (isset($_SESSION['produtosAdicionados'])) {
    unset($_SESSION['produtosAdicionados']);
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