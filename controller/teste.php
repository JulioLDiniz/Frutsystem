<?php 

session_start();

$produtosAdicionados = $_SESSION['produtosAdicionados']; 
$precoTotal = $_SESSION['precoTotal'];
$cliente = 'fulano';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Relatório</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto');
		body{
			font-family: 'Roboto', sans-serif;
		}
		table {
			border: 1px solid;
			width: 100%;
			border-spacing: 0;
		}
		.titulo {
			text-transform: uppercase;
		}
		.fonte-vinte{
			font-size: 20px;
		}
		.linha-abaixo{
			border-bottom: 1px solid;
		}
		.linha-acima{
			border-top: 1px solid;
		}
		.linha-lateral{
			border-right:  1px solid;
		}
		.text-center{
			text-align: center;
		}
		.altura-cinquenta-pixels{
			height: 50px;
		}
		.padding-bottom-quinze{
			padding-bottom: 15px;
		}
		.total-pedido{
			font-weight: bold;
			padding: 15px;
		}
	</style>
</head>
<body>
	<table >
          <thead >
          <tr >
          	<td class="linha-abaixo" colspan="5"><h1 class="text-center titulo">santos da silva comercio eireli</h1></td>
          </tr>
          <tr class="altura-cinquenta-pixels">
          	<td class="fonte-vinte" colspan="4">Cliente: <?= $cliente ?></td>
          	<td class="fonte-vinte" >Vendedor: beltrano</td>
          </tr>
          <tr >
          	<td class="linha-abaixo fonte-vinte padding-bottom-quinze" colspan="4">CNPJ: 0000</td>
          	<td class="linha-abaixo fonte-vinte padding-bottom-quinze">Data: 21/08/2017</td>
          </tr>
            <tr class="altura-cinquenta-pixels">
              <th class="linha-lateral">Item</th>
              <th class="linha-lateral">Descrição</th>
              <th class="linha-lateral">Quantidade</th>
              <th class="linha-lateral">Preço Unitário</th>
              <th >Total Item</th>
            </tr>
          </thead>
          <tbody>
          <?php
          	$contador = 1;
           foreach ($produtosAdicionados as $produto) { ?>

            <tr >
            	<td class="linha-acima text-center linha-lateral"><?php echo $contador; $contador++; ?></td>
              <td class="linha-acima text-center linha-lateral"><?php echo $produto->descricao; ?></td>
              <td class="linha-acima text-center linha-lateral"><?php echo $produto->quantidade; ?></td>
              <td class="linha-acima text-center linha-lateral">R$ <?php echo $produto->precoUnitario; ?></td>
              <td class="linha-acima text-center">R$ <?php echo $produto->precoParcial; ?></td>
              
            </tr>

            <?php } ?>
            <tr>
            	<td class="linha-acima fonte-vinte text-center total-pedido" colspan="5">Total do pedido: R$ <?= $precoTotal ?></td>
            </tr>
          </tbody>
        </table>
        
        </div>
        </div>
</body>
</html>
	
