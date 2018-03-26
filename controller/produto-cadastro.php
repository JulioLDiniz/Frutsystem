<?php 
	
	require_once "../class/produto.class.php";

	$produto = new Produto();

	$produto = $produto->listarPorId(6);
	
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="produto.do.php" method="post">
		<input type="text" name="descricao" value='<?=$produto->descricao  ?>'>
		<input type="text" name="precoUnitario" value="<?=$produto->precoUnitario ?>">
		<button type="submit">Cadastrar</button>

	</form>
</body>
</html>