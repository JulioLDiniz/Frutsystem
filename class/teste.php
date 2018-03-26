<?php 

//Require_once para chamar apenas uma vez, caso haja algum erro, o script é interrompido.
require_once "cliente.class.php";
require_once "produto.class.php";
require_once "usuario.class.php";
	
	$cliente = new Cliente();
	$cliente2 = new Cliente();

	$produto = new Produto();

	$usuario = new Usuario();
	$usuario2 = new Usuario();


	/*$cliente->setRazaoSocial("razaoSocial pra teste");
	$cliente->setTelefone("00000");
	$cliente->setNome("nome pra teste");
	$cliente->setCnpj("cnpj para teste");
	$cliente->setInscricaoEstadual("IE para teste");

	$cliente2->setRazaoSocial("razaoSocial pra teste 2");
	$cliente2->setTelefone("000002");
	$cliente2->setNome("nome pra teste2");
	$cliente2->setCnpj("cnpj para teste2");
	$cliente2->setInscricaoEstadual("IE para teste2");

	//$cliente->alterar($cliente2, 18);
	//$cliente->excluir(24);
	/*$lista = $cliente->listar();
	foreach ($lista as $clientes2) {
		echo $clientes2->telefone."<br>";
		echo $clientes2->nome."<br>";
	}*/

	  //$cliente = $cliente->listarPorId(5);
	   

	//echo $cliente->nome;

	
	   

	//echo $produto->descricao;
	

	 //$produto->listarPorId(5);

	//var_dump($produto);
	//	echo $produto->getId();

	$usuario->setNome("julin");
	$usuario->setLogin("admin");

	$validar = $usuario->validarRegistro($usuario);

	var_dump($validar) ;
	

	
?>