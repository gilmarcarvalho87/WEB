<?php 
    session_start();
   
    //captacao dos dados do formulario
    $titulo = str_replace("#","-",$_POST['titulo']);
    $categoria = str_replace("#","-",$_POST['categoria']);
    $descricao = str_replace("#","-",$_POST['descricao']).PHP_EOL;;
   


    //concatenacao destes dados
    $texto = $_SESSION['id']."#". $_SESSION['status']['0']."# ".$titulo."# ".$categoria."# ". $descricao;  

    //abre arquivo criado, estipula o que será realizado usando a letra "a"
    $arquivo= fopen("registros.txt","a");

    //editando o arquivo acrescentando os dados           
    fwrite($arquivo,$texto);       

    //salvando e fechando 
    fclose($arquivo);
   
    header('location: abrir_chamado.php');
   
         
?>
