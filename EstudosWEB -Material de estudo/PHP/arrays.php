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
 
 		$lista_frutas ["w"] = "pessego";

 		//a tag <pre> faz com que organize de melhor maneira a exibição
	 echo '<pre>';
	      var_dump($lista_frutas);


	
	      echo "O $lista_nomes[0] está comendo $lista_frutas[2]...";

		
	//arrays dentro de arrays 
	   $lista_coisas = [];

	   $lista_coisas["frutas"] = array("banana","maca","pera","uva");
	   $lista_coisas["pessoas"] = ["João","Victor","Marília","Rosa"];	
	   
	  
	  $existe_no_array = in_array("banana", $lista_coisas["frutas"]); 
	  echo "<pre>";
	 		//aqui pegamos o retorno bool que será true=1 false =""
	 		if ($existe_no_array) {
	 			echo "Existe no array.";

	 		}
	 		else{
	 			echo "Não existe no array.";
	 		}
 


	   $existe_no_array2 = in_array("pera", $lista_coisas["frutas"]); 
	  echo "<pre>";
	  if ($existe_no_array2 != null) {
	  	echo "Existe no array.".$existe_no_array2;
	  }else{
	  	echo "Não existe no array.";
	  }
	 		

	?>
	  

</body>
</Html>
