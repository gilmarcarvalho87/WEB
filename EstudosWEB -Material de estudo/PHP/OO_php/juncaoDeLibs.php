<?php

require "./bibliotecas/lib1.php";
require "./bibliotecas/lib2.php";


 use a\Cliente;


    $c=new Cliente();
    print_r($c);
    echo $c->__get('nome');







?>
