<?php


//agora podemos enxugar o codigo onde passamos os argumentos e os mesmos ja servem de atributos.
class Produto{
    public function __construct(
        public string $nome='',
        public float  $valor=0;
    ){}
}


?>