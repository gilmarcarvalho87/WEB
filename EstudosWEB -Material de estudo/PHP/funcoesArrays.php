<DOCTYPE Html>
<Html>
<head>
	<meta charset="utf-8">
	<title>Funcoes de arrays</title>
</head>
<body>
	<?php 	
	$lista_informatica = ["monitor","placa","mouse","fonte","cabo","gabinete","fan"];
	$lista_pessoas = ["Ana","Maria","Aline","Felipa","Roberta","Isabela","Ellen"];

		echo "<h3>lista original</h3>";
		echo "<pre>";
		print_r($lista_informatica);


		echo "<hr>";
		echo "<h3>(sort)ordenando valores e indíces</h3>";
		echo "<pre>";
			sort($lista_informatica);		
			print_r($lista_informatica);	
	  
		echo "<hr>";
		echo "<h3>(asort)ordenando valores mas não os indíces</h3>";
		echo "<pre>";
			asort($lista_informatica);		
			print_r($lista_informatica);	
	  
	  	echo "<hr>";
		echo "<h3>(count)retorna o numero de indices</h3>";
		echo "<pre>";
			echo count($lista_informatica);

		echo "<hr>";
		echo "<h3>(array_merge) funde um ou mais arrays</h3>";
			$novoArray = array_merge($lista_informatica,$lista_pessoas);
			
			echo "<pre>";
			sort($novoArray);
			print_r($novoArray);

		echo "<hr>";
		echo "<h3>(explode) fraciona em partes menores</h3>";

			echo "data original </br>24/06/1987";
			$data = "24/06/1987";
			$novaData = explode("/", $data);
			
			
			echo "<pre>";
		
			print_r($novaData);	
			echo "Convertendo para formato americano";
			echo "<br>";
			echo $novaData[1]." / ". $novaData[0]." / ".$novaData[2];
			
	  

		echo "<hr>";
		echo "<h3>(implode) junta elementos de um array</h3>";
			$string = ['a','b','a','c','a','x','i'];
			

			echo "<pre>";			
			print_r($string);
			print_r(implode($string));
		





























	?>
	  

</body>
</Html>
