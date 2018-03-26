<?php require_once "../class/produto.class.php"; 

$produtos = new Produto();

$produtos = $produtos->listar();

?>
<!DOCTYPE html>

<!-- saved from url=(0032)https://bootswatch.com/spacelab/ -->
<html lang="en" data-livestyle-extension="available"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Frutsystem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../lib/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../lib/custom.min.css">
    <link rel="stylesheet" href="../lib/css/estilo.css">
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
            <li>
              <a href="cliente.php">Cliente</a>
            </li>
            <li>
              <a href="produto.php">Produto</a>
            </li>
            <li>
              <a href="pedido.php">Pedido</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" ><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
          </ul>

        </div>
      </div>
    </div>
  </header>
  <section>
  <br>
  <br>
  <br>
      <h1 class="text-center">Bem vindo ao Frutsystem.</h1>
  </section>
  <footer>
    
  </footer>
    <script src="../lib/jquery-1.10.2.min.js.download"></script>
    <script src="../lib/bootstrap.min.js.download"></script>
    <script src="../lib/custom.js.download"></script>
  <script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>

</body></html>