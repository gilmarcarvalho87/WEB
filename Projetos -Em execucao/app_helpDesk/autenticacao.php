<?php

session_start();
//variaveis globais
$usuario_autenticado= false;
$usuario_id= null;
$usuario_perfil_id= null;

//lista estatica de usuarios autorizados
$listaUsuarios  = array(
   array('id' => 1,'email' => 'gilmar@gmail.com', 'senha' => 'abcd','perfil_id' => 1),
   array('id' => 2,'email' => 'admin@gmail.com', 'senha'=> '1234','perfil_id' => 1),
   array('id' => 3,'email' => 'julica@gmail.com', 'senha' => '1234','perfil_id' => 2),
   array('id' => 4,'email' => 'aline@gmail.com', 'senha' => '1234','perfil_id' => 2)
);
$status= array('0' => 'andamento','1'=>'concluido','2' => 'cancelado');
$perfil= array('1' => 'administrativo', '2'=>'usuario');
//verificacao se esta chegando os dados do array e do form
foreach($listaUsuarios as $user){
    //validacao dos usuarios
    if($user['email'] == $_POST['email']  && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado =true;
        $usuario_id = $user['id'];
        $usuario_perfil_id=$user['perfil_id'];
  
        
 } 
} 
 if($usuario_autenticado == true){     
     $_SESSION['autenticado']='sim';
     $_SESSION['id']= $usuario_id;   
     $_SESSION['status']=$status; 
     $_SESSION['perfil_id']=$usuario_perfil_id; 

  
   

   header('location: home.php');   
    }else{
        $_SESSION['autenticado']='nao';
   header('location: index.php?login=erro');
    }



?>