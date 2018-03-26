<?php 
	require_once "../class/produto.class.php";
	require_once "../class/cliente.class.php";
	require_once "../class/pdf/mpdf.php";
	ob_start(); // inicia o buffer
	session_start();

	
	$cliente = new Cliente();
	$cliente = $cliente->listarPorId($_POST['cliente']);

	$produtosAdicionados = $_SESSION['produtosAdicionados'];
	$precoTotal = $_SESSION['precoTotal'];

	
?>	
<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Relatorio</title>
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
          	<td class="fonte-vinte" colspan="4">Cliente: <?= $cliente->nome ?></td>
          	<td class="fonte-vinte" >Vendedor:<?php echo $_SESSION['usuario']?></td>
          </tr>
          <tr >
          	<td class="linha-abaixo fonte-vinte padding-bottom-quinze" colspan="4">CNPJ: <?= $cliente->cnpj ?></td>
          	<td class="linha-abaixo fonte-vinte padding-bottom-quinze">Data: <?php echo date('d/m/Y'); ?></td>
          </tr>
            <tr class="altura-cinquenta-pixels">
              <th class="linha-lateral">Item</th>
              <th class="linha-lateral">Descricao</th>
              <th class="linha-lateral">Quantidade</th>
              <th class="linha-lateral">Preco Unitario</th>
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
              <td class="linha-acima text-center linha-lateral">R$ <?php echo number_format($produto->precoUnitario, 2) ; ?></td>
              <td class="linha-acima text-center">R$ <?php echo number_format($produto->precoParcial, 2) ; ?></td>
              
            </tr>

            <?php } ?>
            <tr>
            	<td class="linha-acima fonte-vinte text-center total-pedido" colspan="5">Total do pedido: R$ <?=number_format($precoTotal, 2)  ?></td>
            </tr>
          </tbody>
        </table>
        
        </div>
        </div>
</body>
</html>
<?php 
	$arquivo = 'Pedido '.$cliente->nome.date('d/m/Y');
	$html = ob_get_clean();

	$html = utf8_encode($html);

	$mpdf = new mPDF('utf-8', 'A4');
	$mpdf->allow_charset_conversion=true;
	$mpdf->charset_in='UTF-8';

	$mpdf->WriteHTML($html);
	$mpdf->Output($arquivo,'I');


	unset($_SESSION['produtosDisponiveis']);
	unset($_SESSION['produtosAdicionados']);
	unset($_SESSION['precoTotal']);
	exit();
	
?>