<DOCTYPE Html>
<Html>
<head>
	<meta charset="utf-8">
	<title>Doador de Sangue</title>
</head>
<body>
	<?php 

	$idade = 60;
	$peso=50;


	if ($idade < 16  || $idade >= 70 || $peso < 50) {
		echo "Não atende  aos requesitos";
	}else{
		echo "Atende aos requesitos";	
	}

	?>

</body>
</Html>
