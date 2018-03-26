<?php 
	require_once "../class/produto.class.php";
	session_start();
	$produto = new Produto();

	if(isset($_POST['cad-descricao']) && isset($_POST['cad-precoUnitario'])){
		$produto->setDescricao($_POST['cad-descricao']);
		$produto->setPrecoUnitario($_POST['cad-precoUnitario']);
		if ($produto->validarRegistro($produto)) {
			$produto->inserir($produto);
			$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Produto cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger container text-center'>Já existe registro com esses dados!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}
		
		header("Location: ../view/produto.php");
	}else if(isset($_POST['alt-descricao']) && isset($_POST['alt-precoUnitario']) && isset($_POST['alt-id'])){
		$produto->setDescricao($_POST['alt-descricao']);
		$produto->setPrecoUnitario($_POST['alt-precoUnitario']);
		$produto->setId($_POST['alt-id']);
		$produto->alterar($produto);
		$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Produto alterado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: ../view/produto.php");
	}else if(isset($_POST['exc-descricao']) && isset($_POST['exc-precoUnitario']) && isset($_POST['exc-id'])){
		//passando todos os parâmetros para garantia da exclusão do registro
		$produto->setId($_POST['exc-id']);
		$produto->excluir($produto->getId());
		$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Produto excluído com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: ../view/produto.php");
	}

	




	


?>	