<?php
  defined('CONTROL') or die('<h1>Acesso Inválido</h1>');
     
  $api = new ApiConsumer();
  //Pega o que foi escolhido no front. se nao houver recebe null
  $country= $_GET['country_name'] ?? null;

  //verifica se nao esta preenchida direciona para  
  if (!isset($country)) {
        header("Location: ?route=home");
    die();
  } 
  
  $country_data=$api->get_country($country);
?>

<div class="container mt-5">
    <div class="d-flex">
        <div class="card p-2 shadows">
            <img src="<?= $country_data['0']['flags']['png']?>" alt="">
        </div>
        <div class="ms-5 align-self-center ">
            <p class="mb-0">País:  </p><span class="display-4"><?=$country_data['0']['name']['common']?> </span> 
            <p class="mt-5 mb-1">Capital: <strong><?=$country_data[0]['capital'][0]?></strong></p>
           
          
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <p>Continente: </br><strong><?=$country_data[0]['region'] ?></strong></p>
            <p>population: </br><strong><?=$country_data[0]['population'] ?></strong> Habitantes</p>
            <p>Região: </br><strong><a target="_blank" href="<?=$country_data[0]['maps']['googleMaps'] ?> ">Ver no Maps</a></strong></p>
        </div>
    </div>
    <a href="http://localhost/Apis/API_001/?route=home">
        <input class="btn btn-info" type="button" value="Voltar"></input>
    </a>
</div>