<?php

session_start();
//variaveis globais
$usuario_autenticado=false;

//lista estatica de usuarios autorizados
$listaUsuarios  = array(
   array('email' => 'gilmar@gmail.com', 'senha' => 'abcd'),
   array('email' => 'admin@gmail.com', 'senha'=> '1234'),
   array('email' => 'julica@gmail.com', 'senha' => '000')
  
);

//verificacao se esta chegando os dados do array e do form
foreach($listaUsuarios as $user){
    //validacao dos usuarios
    if($user['email'] == $_POST['email']  && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado =true;

 } 
} 
 if($usuario_autenticado == true){     
    $_SESSION['autenticado']='sim';
    header('location: home.php');
   
    }else{
        $_SESSION['autenticado']='nao';
        header('location: index.php?login=erro');
    }



?>