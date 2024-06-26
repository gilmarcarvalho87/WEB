<?php 
$acao ='recuperar';
	require 'tarefaController.php';
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script>
		
				function editar(id,txt_tarefa){
					//Criacao de formulario edicao
					let form = document.createElement('form');
						form.action='tarefaController.php?acao=atualizar';
						form.method='POST';
						form.className='row d-flex  mt-4';			
					

					let caixa = document.createElement('input');
						caixa.type='text';
						caixa.name='tarefa';
						caixa.className='col-10 form-control ';
						caixa.value=txt_tarefa;	
						caixa.id='tarefa';							
						
					let inputId = document.createElement('input');
						inputId.type="hidden";
						inputId.value=id;
						inputId.name='id'


					let botao = document.createElement('button');
						botao.type='submit';
						botao.className='col btn btn-info';
						botao.innerHTML='Atualizar';

						//arvore de elementos						
						form.appendChild(caixa);
						form.appendChild(inputId);
						form.appendChild(botao);

						//selecionar a div da tarefa
					let tarefa= document.getElementById('tarefa_'+ id );
						tarefa.innerHTML="";	
						tarefa.insertBefore(form,tarefa[0]);
						
					
						
					
				}
				function remover(id){			
					location.href='todas_tarefas.php?acao=remover&id='+id; 
				}
				function marcarRealizada(id){			
					location.href='todas_tarefas.php?acao=marcarRealizada&id='+id; 
				}
				
				
						
			
		</script>



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

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />
								
								<? foreach($tarefas as $indice => $tarefa){?>				
									
									<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?=$tarefa->id ?>">
												<?=$tarefa->tarefa?> (<?=$tarefa->status?>)
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">										
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?=$tarefa->id ?>)"></i>
									
										<?if($tarefa->status != 'realizado'){ ?>
												<i class="fas fa-edit fa-lg text-info"  onclick="editar(<?=$tarefa->id ?>,'<?=$tarefa->tarefa?>' )"></i>
										<? } ?>	
											<?if ($tarefa->status != 'realizado') { ?>
												<i class="fa-solid fa-xmark text-danger fa-lg" name="checkBox" onclick="marcarRealizada(<?=$tarefa->id ?>)"></i>
																								
											<?}?>
											<?if ($tarefa->status == 'realizado') {?>
												<i class="fa-solid fa-check text-success" name="checkBox" onclick="marcarRealizada(<?=$tarefa->id ?>)"></i>
														
											<?}?>							
											
										</div>
									</div>							
								<? } ?>
									
										
			

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>