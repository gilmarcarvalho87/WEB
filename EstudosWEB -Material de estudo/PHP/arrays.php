<DOCTYPE Html>
<Html>
<head>
	<meta charset="utf-8">
	<title>Arrays</title>
</head>
<body>
	<?php 
		
	//arrays sequencias

	$lista_nomes=[];

	$lista_nomes[]="Gilmar";
	$lista_nomes[]="Gustavo";
	$lista_nomes[]="Rita";
	$lista_nomes[]="Vera";


	echo " <pre>";
	var_dump($lista_nomes);




	//arrays associativos 	
	 $lista_frutas = [

	 "a" => "banana",	
	 "b" => "uva",
	 "z" => "pera",
	 "2" => "abacaxi"
	];
 

 		//a tag <pre> faz com que organize de melhor maneira a exibição
	 echo '<pre>';
	      var_dump($lista_frutas);




			
	      echo "O $lista_nomes[0] está comendo $lista_frutas[2]...";





	?>

</body>
</Html>
