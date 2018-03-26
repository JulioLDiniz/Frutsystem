<?php 
	require_once "../class/cliente.class.php";
	session_start();
	$cliente = new Cliente();

	if(isset($_POST['cad-nome']) && isset($_POST['cad-telefone']) && isset($_POST['cad-razao-social']) && isset($_POST['cad-cnpj']) && isset($_POST['cad-inscricao-estadual'])){

		$cliente->setNome($_POST['cad-nome']);
		$cliente->setTelefone($_POST['cad-telefone']);
		$cliente->setRazaoSocial($_POST['cad-razao-social']);
		$cliente->setCnpj($_POST['cad-cnpj']);
		$cliente->setInscricaoEstadual($_POST['cad-inscricao-estadual']);
		if($cliente->validarRegistro($cliente)){
			$cliente->inserir($cliente);
			$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Cliente cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger container text-center'>Já existe registro com esses dados!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}		

		header("Location: ../view/cliente.php");

	}else if(isset($_POST['alt-id']) && isset($_POST['alt-nome']) && isset($_POST['alt-telefone']) && isset($_POST['alt-razao-social']) && isset($_POST['alt-cnpj']) && isset($_POST['alt-inscricao-estadual'])){

		$cliente->setId($_POST['alt-id']);
		$cliente->setNome($_POST['alt-nome']);
		$cliente->setTelefone($_POST['alt-telefone']);
		$cliente->setRazaoSocial($_POST['alt-razao-social']);
		$cliente->setCnpj($_POST['alt-cnpj']);
		$cliente->setInscricaoEstadual($_POST['alt-inscricao-estadual']);
		
		$cliente->alterar($cliente);
			$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Cliente alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		
		header("Location: ../view/cliente.php");

	}else if(isset($_POST['exc-id']) && isset($_POST['exc-nome']) && isset($_POST['exc-telefone']) && isset($_POST['exc-razao-social']) && isset($_POST['exc-cnpj']) && isset($_POST['exc-inscricao-estadual']) && isset($_POST['exc-id'])){
		//passando todos os parâmetros para garantia da exclusão do registro
		$cliente->setId($_POST['exc-id']);
		$cliente->excluir($cliente->getId());
		$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Cliente excluído com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: ../view/cliente.php");
	}

	




	


?>	