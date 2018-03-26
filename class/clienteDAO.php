<?php 

	require_once("cliente.class.php");
		require_once "conexao.php";

	class clienteDAO {

		public function __construct(){
			$cliente = new Cliente();
			
		}
		

		public function inserir($cliente)
		{
			$pdo = conectar();
			$insert = $pdo->prepare("INSERT INTO cliente(nomeFantasia, razaoSocial, cnpj) values (:nomeFantasia,:razaoSocial,:cnpj)");
			$p1 = $cliente->getNomeFanstasia();
			$insert->bindParam(":nomeFantasia",$p1);
			$insert->bindParam(":razaoSocial",$cliente->getRazaoSocial());
			$insert->bindParam(":cnpj",$cliente->getCnpj());
			$insert->execute();
		}


	}


?>