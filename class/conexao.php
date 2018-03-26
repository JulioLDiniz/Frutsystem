<?php 
	
	function conectar(){
		$user = "id2675734_root";
		$pass = "frutsystem";
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=id2675734_frutsystem",$user,$pass);
			return $pdo;
		}catch(PDOException $e){
			echo "<h1>Erro ao conectar-se ao Banco de Dados. Contate o administrador.</h1>" ;
		}
		
	}
	
?>