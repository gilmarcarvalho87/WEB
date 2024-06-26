<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	</head>

	<body>
	
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>	

		
		<?php  if(isset($_GET["inclusao"]) && $_GET["inclusao"] == 1){ ?>
			<div  class="incluido  bg-success text-light d-flex justify-content-center  rounded p-2">
				<h5><strong>Tarefa Incluída</strong></h5>
			</div>				
		<?php } ?>


		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">	
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr/>

								<form method="POST" action="tarefaController.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input type="text" name="tarefa" autofocus class="form-control" placeholder="Exemplo: Lavar o carro">
									</div>

									<button class="btn btn-success">Cadastrar</button>
									
								</form>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	</body>
</html>