<?php
    $busca=26;
    //usando o match para comparacao

    $retornoMarch = match(true){
        $busca > 0  && $busca <= 2  => 'iniciando',
        $busca > 2  && $busca <= 12  => 'criança',
        $busca > 12 && $busca <= 15  => 'pre adolecente',
        $busca > 15 && $busca <= 18  => 'adolescente',
        $busca > 18 && $busca <= 25 => 'jovem',
        $busca > 25 => 'adulto',
        default => 'fora dos padroes'
        
    };
    echo $retornoMarch;
?>