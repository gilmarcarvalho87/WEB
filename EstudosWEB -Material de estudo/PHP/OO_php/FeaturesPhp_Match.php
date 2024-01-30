<?php
    $busca = 'x';

    $retornoBusca = match($busca){
        1 => '<h1>Encontrou um em forma de numero',
        '1' => '<h1>Encontrou um em forma de letra',
          5,'12',8,'x' => '<h1>Encontrou numeros fora',
        default => '<h1>Inexistentes'
    };
    echo $retornoBusca;

?>