<?php 
session_start();
	require_once "../class/conexao.php";
		
	if(isset($_POST['usuario']) && isset($_POST['senha'])){
		$login = addslashes($_POST['usuario']);
		$senha = addslashes($_POST['senha']);
		$senha = md5($senha);

		$pdo = conectar();
		$logar = $pdo->prepare("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'");
		$logar->execute();
		$logado = $logar->fetch(PDO::FETCH_ASSOC);
		unset($pdo);
		if(!empty($logado)){
			$_SESSION['usuario'] = $logado['nome'];
			if($_SESSION['usuario']=='Administrador'){
				header("Location: ../view/usuario.php");
			}else{
				header("Location: ../view/pedido.php");
			}			
		}else if(empty($logado)){
			$_SESSION['msg-erro-login'] = "<div class='alert alert-danger container text-center'>Usuário e/ou senha inválido(s)!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: ../login.php");
		}

	}
	if(isset($_GET['sair'])){
		header("Location: ../login.php");
		session_destroy();
	}
?>