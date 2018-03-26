<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Acesso ao Frutsystem</title>
	<link rel="stylesheet" href="lib/css/estilo-login.css">
	<link rel="stylesheet" href="lib/bootstrap.css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php 
            if(isset($_SESSION['msg-erro-login'])){
            echo $_SESSION['msg-erro-login'];
            unset($_SESSION['msg-erro-login']);
          }
      ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12  col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Frutsystem - Faça o Login</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" action="controller/valida-login.php" method="post">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
	<script src="lib/jquery-1.10.2.min.js.download"></script>
    <script src="lib/bootstrap.min.js.download"></script>
    <script src="lib/custom.js.download"></script>
    <script src="lib/js/script.js"></script>  
</body>
</html>