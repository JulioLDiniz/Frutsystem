<?php 

require_once "conexao.php";

class Usuario{
	private $id, $nome, $login, $senha;

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
	public function getLogin()
	{
		return $this->login;
	}
	public function setLogin($login)
	{
		$this->login = $login;
	}
	public function getSenha()
	{
		return $this->senha;
	}
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}

	public function inserir(Usuario $usuario)	{
		$pdo = conectar();
		$insert = $pdo->prepare("INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)");
		$insert->bindValue(":nome",$usuario->getNome());
		$insert->bindValue(":login",$usuario->getLogin());
		$insert->bindValue(":senha",$usuario->getSenha());
		$insert->execute();
		unset($pdo);
	}
	public function alterar(Usuario $usuario)	{
		$pdo = conectar();
		$update = $pdo->prepare("UPDATE usuario SET nome = :nome, login = :login, senha = :senha WHERE id = :id");
		$update->bindValue(":nome",$usuario->getNome());
		$update->bindValue(":login",$usuario->getLogin());
		$update->bindValue(":senha",$usuario->getSenha());
		$update->bindValue(":id",$usuario->getId());
		$update->execute();
		unset($pdo);
	}
	public function excluir($id)	{
		$pdo = conectar();
		$delete = $pdo->prepare("DELETE from usuario WHERE id = :id");
		$delete->bindValue(":id",$id);
		$delete->execute();
		unset($pdo);
	}
	public function listar()	{
		$pdo = conectar();
		$select = $pdo->prepare("SELECT * FROM usuario");
		$select->execute();

		$usuarios = $select->fetchAll(PDO::FETCH_OBJ);

		return $usuarios;

		unset($pdo);
	}
	public function listarPorId($id)	{
		$pdo = conectar();
		$select = $pdo->prepare("SELECT * FROM usuario WHERE id=:id");
		$select->bindValue(":id",$id);
		$select->execute();

		$usuario = $select->fetch(PDO::FETCH_OBJ);

		return $usuario;

		unset($pdo);
	}
	public function validarRegistro(Usuario $usuario){
		$pdo = conectar();
		$validar = $pdo->prepare("SELECT * FROM usuario WHERE nome = :nome OR login = :login ");
		$validar->bindValue(":nome",$usuario->getNome());
		$validar->bindValue(":login",$usuario->getLogin());
		$validar->execute();
		if($validar->rowCount() == 0){
			return true;
		}else{
			return false;
		}
	}
}

?>