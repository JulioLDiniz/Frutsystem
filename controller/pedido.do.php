<?php 
	require_once "../class/produto.class.php";
	session_start();
	$produto = new Produto();
	if (isset($_SESSION['produtosDisponiveis']) && $_GET['movimentacao'] == 'adicionar'){

		if(!isset($_SESSION['produtosAdicionados'])){
			$produtosAdicionados = array();
			$_SESSION['produtosAdicionados']= $produtosAdicionados ;
		}
		$produtosAdicionados = $_SESSION['produtosAdicionados'];
		$produtosDisponiveis = $_SESSION['produtosDisponiveis'];
		$item = $_POST['ins-descricao'];

		if(!isset($_SESSION['precoTotal'])){
			$precoTotal = null;
		}else{
			$precoTotal = $_SESSION['precoTotal'];
		}
		// buscar o index do array com base no valor

		foreach ($produtosDisponiveis as $key => $value){
			
				if($value->descricao == $item){
					$value->precoUnitario = $_POST['ins-precoUnitario'];
					$value->quantidade = $_POST['ins-quantidade'];
					$value->precoParcial = (($value->precoUnitario)*($value->quantidade));
					$precoTotal += $value->precoParcial;
					unset($produtosDisponiveis[$key]);
					array_push($produtosAdicionados, $value);
				}
				
			}
		asort($produtosAdicionados);
		asort($produtosDisponiveis);
		$_SESSION['precoTotal'] = $precoTotal;
		$_SESSION['produtosDisponiveis'] = $produtosDisponiveis;
		$_SESSION['produtosAdicionados'] = $produtosAdicionados;
		
		$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Produto adicionado ao pedido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

		header("Location: ../view/pedido.php");
	}elseif (isset($_SESSION['produtosAdicionados']) && $_GET['movimentacao'] == 'remover') {
		
		$produtosAdicionados = $_SESSION['produtosAdicionados'];
		$produtosDisponiveis = $_SESSION['produtosDisponiveis'];
		$item = $_POST['rem-descricao'];
		$precoTotal = $_SESSION['precoTotal'];
		// buscar o index do array com base no valor

		foreach ($produtosAdicionados as $key => $value){
				if($value->descricao == $item){
					$produto = $produto->listarPorId($value->id);
					$value->precoUnitario = $produto->precoUnitario;
					$precoTotal -= $value->precoParcial;
					unset($produtosAdicionados[$key]);
					array_push($produtosDisponiveis, $value);
				}
			}
		asort($produtosAdicionados);
		asort($produtosDisponiveis);
		$_SESSION['precoTotal'] = $precoTotal;
		$_SESSION['produtosDisponiveis'] = $produtosDisponiveis;
		$_SESSION['produtosAdicionados'] = $produtosAdicionados;

		$_SESSION['msg'] = "<div class='alert alert-success container text-center'>Produto removido do pedido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

		header("Location: ../view/pedido.php");
	}





	




	


?>	