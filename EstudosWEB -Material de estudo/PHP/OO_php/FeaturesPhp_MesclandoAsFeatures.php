<?php


//agora podemos enxugar o codigo onde passamos os argumentos e os mesmos ja servem de atributos.
class Produto{
    public function __construct(public string $nome='',public float  $valor=0){

    }
}
//instancias-antiga forma argumentar
$produto = new Produto("televisao",2500);
//nova forma de argumentar
$produto2 = new Produto(valor:45,nome:'jogo');




echo '<h2>Produto: '.$produto->nome;
echo '<br>';
echo 'Valor: '.$produto->valor;     
echo'<hr>';   

echo '<h2>Produto: '.$produto2->nome;
echo '<br>';
echo 'Valor: '.$produto2->valor;     
echo'<hr>'; 



?>