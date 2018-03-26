<?php 
require_once "conexao.php";
class Cliente{
	private $id, $nome, $telefone, $razaoSocial, $cnpj, $inscricaoEstadual;



	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function getRazaoSocial()
	{
		return $this->razaoSocial;
	}
	public function setRazaoSocial($razaoSocial)
	{
		$this->razaoSocial = $razaoSocial;
	}
	public function getCnpj()
	{
		return $this->cnpj;
	}
	public function setCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}
	public function getTelefone()
	{
		return $this->telefone;
	}
	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	public function getInscricaoEstadual()
	{
		return $this->inscricaoEstadual;
	}
	public function setInscricaoEstadual($inscricaoEstadual)
	{
		$this->inscricaoEstadual = $inscricaoEstadual;
	}

	public function inserir(Cliente $cliente)
		{
			$pdo = conectar();
			$insert = $pdo->prepare("INSERT INTO cliente(nome, telefone, razaoSocial, cnpj, inscricaoEstadual) values (:nome,:telefone,:razaoSocial,:cnpj,:inscricaoEstadual)");
			$insert->bindValue(":nome",$cliente->getNome());
			$insert->bindValue(":telefone",$cliente->getTelefone());
			$insert->bindValue(":razaoSocial",$cliente->getRazaoSocial());
			$insert->bindValue(":cnpj",$cliente->getCnpj());
			$insert->bindValue(":inscricaoEstadual",$cliente->getInscricaoEstadual());
			$insert->execute();

			unset($pdo);
		}

	public function alterar(Cliente $cliente){
		$pdo = conectar();
		$update = $pdo->prepare("UPDATE cliente SET nome=:nome, telefone=:telefone, razaoSocial=:razaoSocial, cnpj=:cnpj, inscricaoEstadual=:inscricaoEstadual 
			WHERE id=:id");
		$update->bindValue(":nome",$cliente->getNome());
		$update->bindValue(":telefone",$cliente->getTelefone());
		$update->bindValue(":razaoSocial",$cliente->getRazaoSocial());
		$update->bindValue(":cnpj",$cliente->getCnpj());
		$update->bindValue(":inscricaoEstadual",$cliente->getInscricaoEstadual());
		$update->bindValue(":id",$cliente->getId());
		$update->execute();
		unset($pdo);
	}

	public function excluir($id) {
		$pdo = conectar();
		$delete = $pdo->prepare("DELETE FROM cliente WHERE id=:id");
		$delete->bindValue(":id",$id);
		$delete->execute();
		unset($pdo);
	}

	public function listar() {
		$pdo=conectar();
		$select = $pdo->prepare("SELECT * FROM cliente");
		$select->execute();

		//PDO::FETCH_ASSOC - para retornar um array associativo
		$clientes = $select->fetchAll(PDO::FETCH_OBJ);

		return $clientes;
		//foreach ($clientes as $cliente ) {
		//	echo $cliente->telefone."<br>";
		//}
		unset($pdo);
	}

	public function listarPorId($id){
		//$cliente = new Cliente();
		$pdo=conectar();
		$select = $pdo->prepare("SELECT * FROM cliente WHERE id=:id");
		$select->bindValue(":id",$id);
		$select->execute();

		//PDO::FETCH_ASSOC - para retornar um array associativo
		$cliente = $select->fetch(PDO::FETCH_OBJ);


		return $cliente;
		unset($pdo);
	}
	public function validarRegistro(Cliente $cliente){
		$pdo = conectar();
		$validar = $pdo->prepare("SELECT * FROM cliente WHERE nome = :nome OR cnpj = :cnpj OR razaoSocial = :razaoSocial OR inscricaoEstadual = :inscricaoEstadual");
		$validar->bindValue(":nome",$cliente->getNome());
		$validar->bindValue(":cnpj",$cliente->getCnpj());
		$validar->bindValue(":razaoSocial",$cliente->getRazaoSocial());
		$validar->bindValue(":inscricaoEstadual",$cliente->getInscricaoEstadual());
		$validar->execute();
		if($validar->rowCount() == 0){
			return true;
		}else{
			return false;
		}
	}


}

?>