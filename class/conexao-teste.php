<?php 
	/*$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "frutsystem";

	$conexao = mysqli_connect($host, $user, $pass);
	$bd = mysqli_select_db($conexao, $dbname);*/

	try{
		$pdo = new PDO("mysql:host=localhost;dbname=frutsystem","root","");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	/*$id = $_GET["id"];

	$consulta = $pdo->prepare("select * from produto where id=:id");
	$consulta->bindValue(":id", $id);
	$consulta->execute();

	echo $consulta->rowCount();

	$descricao = $_GET["descricao"];

	$sql = $pdo->prepare("insert into produto(descricao) values (:descricao)");
	$sql->bindValue(":descricao",$descricao);
	$sql->execute();

	$descricao = $_GET["descricao"];
	$sql = $pdo->prepare("delete from produto where descricao=:descricao");
	$sql->bindValue(":descricao", $descricao);
	
	$sql->execute();*/

	$descricao = $_GET["descricao"];
	//PREPARANDO A QUERY
	$insert = $pdo->prepare("insert into produto (descricao) values (:descricao)");
	$insert->bindValue(":descricao", $descricao);
	//VALIDANDO A QUERY COM BASE NO BANCO
	$validar = $pdo->prepare("select * from produto where descricao=?");
	$validar->execute(array($descricao));
	if($validar->rowCount()==0){
		$insert->execute();
	}else{
		echo "Já existe!";
	}


	
	
?>