
<?php require_once "validador_acesso.php"?>
    <?php
        $temRegistros="false";
        //criamos um array
        $chamados = array();
        
        //usamos este para abrir o arquivo e determinar o que podemos fazer usando a letra, no caso "r"
        $registros= @fopen('registros.txt','r');
          if($registros == null){
              echo '<h1>Não existe arquivos de registros</h1>';           
          }else {
           
            /*usamos "feof" por padrao ele retorna false, por isso usamos a negacao "!" para entrar no laço,e 
                usamos  para percorrer,enquanto houver registros*/
              while (!feof($registros)) {
                //"fgets" pega todos os caracteres da linha. salvamos no array ja criado.
                $chamados[]=fgets($registros);              
              }
    
          }      
         

      
       
    ?>




<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item mr-3">
           <a class="nav-link" href="logoff.php">Sair</a>
        </li>       
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header  ">
              <strong>CONSULTA DE CHAMADOS</strong>
            </div>
            
            <div class="card-body">
              
            <?php foreach($chamados as $chamado){ ?>
                  <?php 
                    $chamado_dados= explode("#",$chamado);  
                    //retirando possivel card vazio gerado
                    if(count($chamado_dados) < 5){
                      continue;
                    }

                    //validar tipo de perfil ususario ou administrativo
                    if ($_SESSION['perfil_id'] == 2 ) {
                      //mostrar somente dados deste usuario 
                      if($_SESSION['id'] != $chamado_dados['0']){
                        continue;
                  }
                      }
                  
                  ?>
                  
                      <div class="card  bg-light m-2">
                    <div class="card-body  d-flex ">
                    
                    <div class="col-sm-2 text-info">
                      <p class="mt-1">Título: </p>
                      <p class="">Categoria: </p>
                      <p class="">Descrição: </p>
                      <p class="">Criador chamado: </p>                

                    </div>
                    <div class="col-sm ">
                      <h4 class="card-text mb-3"><?=$chamado_dados["2"];?></h4>   
                      <p class="card-text text-muted "><?=$chamado_dados["3"];?></p>   
                      <p class="card-text "><?=$chamado_dados["4"];?> </strong></p>
                      <p class="card-text "><?=$chamado_dados["0"];?></p>
                     </div>
                     <div class="col-sm-3 align-self-end mb-3">
                     
                        <h6 >status: </h6>
                        <p class="card-text text-success" > <?=$chamado_dados["1"];?> </p>
                     </div>
             
                    <div>
                      <button class="btn "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                      </svg> </button>
                    </div>
                      


                    </div>
                  </div>

              <?php } ?>
             

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>