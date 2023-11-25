<DOCTYPE Html>
<Html>
<head>
	<meta charset="utf-8">
	<title>NULL_FALSE_VAZIO</title>
</head>
<body>
	<?php 
	
		$funcionario= "";
		$funcionario2=null;
		$funcionario3=false;

		//verifica se é nula
		if (is_null($funcionario)) {
			echo "funcionario é nula";
		}else{
			echo "funcionario nao é nula";
		} 
		echo "<br>";


		if (empty($funcionario)) {
			echo "funcionario é vazia";
		}else{
			echo "funcionario nao é vazia";
		}

		

		if (is_null($funcionario2)) {
			echo "funcionario2 é nula";
		}else{
			echo "funcionario2 nao é nula";
		}


		echo "<br>";
		if (is_null($funcionario3)) {
			echo "funcionario3 é nula";
		}else{
			echo "funcionario3 nao é nula";
		}
		echo "<hr>";





		if (empty($funcionario)) {
			echo "funcionario é vazia";
		}else{
			echo "funcionario nao é vazia";
		}
		echo "<br>";
			if (empty($funcionario2)) {
			echo "funcionario2 é vazia";
		}else{
			echo "funcionario2 nao é vazia";
		}
		echo "<br>";

		if (empty($funcionario3)) {
			echo "funcionario3 é vazia";
		}else{
			echo "funcionario3 nao é vazia";
		}

	echo "<hr>";





		if (is_bool($funcionario)) {
			echo "funcionario é true";
		}else{
			echo "funcionario nao é false";
		}
		echo "<br>";
			if (is_bool($funcionario2)) {
			echo "funcionario2 é true";
		}else{
			echo "funcionario2 nao é false";
		}
		echo "<br>";

		if (is_bool($funcionario3)) {
			echo "funcionario3 é true";
		}else{
			echo "funcionario3 nao é false";
		}



	?>
	  

</body>
</Html>
