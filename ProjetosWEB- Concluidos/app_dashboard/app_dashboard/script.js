$(document).ready(() => {

/*	//usando o load()
	$("#li_documentacao").on('click', ()=>{
		$('#pagina').load('documentacao.html')
	})
	$("#li_suporte").on('click', ()=>{
		$('#pagina').load('suporte.html')
	})
*/
	//usando o get ou post
	$('#li_documentacao').on('click',  ()=>{
		$.get('documentacao.html', data => {			
			$('#pagina').html(data);
		})
	})
	$('#li_suporte').on('click',  ()=>{
		$.post('suporte.html', data => {
			$('#pagina').html(data);
		})	
	})
		$('#competencia').on('change', (e)=>{		
			let competencia=$(e.target).val();	
			
			$.ajax({ 
				type:'GET',										
				url: 'app.php',						      //pagina destino			
				data:`competencia= ${competencia}`,      //mes,ano escolhido
				dataType:'json',						//responseText será em json
				success: dados =>{ 
					console.log(dados)
					$('#numeroVendas').html(dados.numeroVendas)
					$('#totalVendas').html(dados.totalVendas)
					$('#clienteAtivo').html(dados.clienteAtivo)
					$('#clienteInativo').html(dados.clienteInativo)
					$('#total_despesas').html(dados.total_despesas)
		
				}, 
					erro: erro =>{console.log(erro)}	
			})


		})			


			  



	
})

	

	
