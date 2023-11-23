<html>
<head>
	<meta charset="utf-8">


	<title>Curso PHP</title>
</head>
	<body>

	

		<?php 

			$Usuario_possui_cartao_da_loja= true;
			$valor_da_compra=420;
			$valor_frete=50;
			$recebeu_valor_frete=false;

			if ($Usuario_possui_cartao_da_loja && $valor_da_compra >= 400) {
				$valor_frete=0;
				$recebeu_valor_frete=true;	
			}
			else if ($Usuario_possui_cartao_da_loja  && $valor_da_compra >= 300) {
					$valor_frete=25;
					$recebeu_valor_frete=true;	
			}
			else if ($Usuario_possui_cartao_da_loja  && $valor_da_compra >= 200) {
					$valor_frete=40;
					$recebeu_valor_frete=true;	
			}
		?>

		<h1 style="color: red;">Detalhes do Pedido</h1>
		<p>Usuário Possui Cartâo da Loja? 	<?php if($Usuario_possui_cartao_da_loja == true) {echo "Sim";}else{echo "Não";} ?></p>
		<p>Valor da compra: 				<?= $valor_da_compra ?></p>
		<p>Recebeu desconto do frete:	    <?php if($recebeu_valor_frete == true) {echo "Sim";}else{echo "Não";} ?></p>
		<p>Valor do frete:				    <?=$valor_frete ?> </p>
		

	</body>

</html>