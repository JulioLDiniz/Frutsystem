<?php 

require_once "conexao.php";

class Produto{
	private $id, $descricao, $precoUnitario;

	public function getDescricao()
	{
		 return $this->descricao;
	}
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	public function getPrecoUnitario()
	{
		 return $this->precoUnitario;
	}
	public function setPrecoUnitario($precoUnitario)
	{
		$this->precoUnitario = $precoUnitario;
	}
	public function getId()
	{
		 return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}

	public function inserir(Produto $produto){	
		$pdo = conectar();
		$inserir = $pdo->prepare("INSERT INTO produto (descricao, precoUnitario) VALUES (:descricao, :precoUnitario)");
		$inserir->bindValue(":descricao", $produto->getDescricao());
		$inserir->bindValue(":precoUnitario", $produto->getPrecoUnitario());
		$inserir->execute();
		unset($pdo);
	}

	public function alterar(Produto $produto)
	{
		$pdo = conectar();
		$alterar = $pdo->prepare("UPDATE produto SET descricao=:descricao, precoUnitario=:precoUnitario WHERE id=:id");
		$alterar->bindValue(":descricao",$produto->getDescricao());
		$alterar->bindValue(":precoUnitario",$produto->getPrecoUnitario());
		$alterar->bindValue(":id",$produto->getId());
		$alterar->execute();
		unset($pdo);
	}

	public function excluir($id)
	{
		$pdo = conectar();
		$excluir = $pdo->prepare("DELETE FROM produto WHERE id=:id");
		$excluir->bindValue(":id",$id);
		$excluir->execute();
		unset($pdo);
	}

	public function listar()
	{
		$pdo = conectar();
		$listar = $pdo->prepare("SELECT * FROM produto");
		$listar->execute();

		$produtos = $listar->fetchAll(PDO::FETCH_OBJ);

		//foreach ($produtos as $cliente ) {
		//	echo $cliente->descricao."<br>";
		//}
		return $produtos;

		unset($pdo);
	}

	public function listarPorId($id)
	{
		$pdo = conectar();
		$listar = $pdo->prepare("SELECT * FROM produto WHERE id=:id");
		$listar->bindValue("id",$id);
		$listar->execute();

		$produto = $listar->fetch(PDO::FETCH_OBJ);

		return $produto;

		unset($pdo);
	}

	public function validarRegistro(Produto $produto){
		$pdo = conectar();
		$validar = $pdo->prepare("SELECT * FROM produto WHERE descricao = :descricao");
		$validar->bindValue(":descricao",$produto->getDescricao());
		$validar->execute();
		if($validar->rowCount() == 0){
			return true;
		}else{
			return false;
		}
	}

}
	
?>