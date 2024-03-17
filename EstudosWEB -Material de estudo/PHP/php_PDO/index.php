<?php 
      
      print_r($_POST);
  
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=php_banco_pdo','root','');              
        $query = "select * from tb_usuarios where";
        $query .="email = :usuario"; 
        $query .=" AND senha = :senha"; 

        $statment=$conexao->prepare($query);

        $statment->bindValue(':usuario', $_POST['usuario']);
        $statment->bindValue(':senha', $_POST['senha']);
        $statment ->execute();
        $usuario=$statment->fetch();           
            echo "<pre>";
            print_r($usuario);
            echo "</pre>";
        
       }catch(PDOException $e){
         $e->getCode();   
        }     
        
    
   
?> 

<html>
  <head>
         <meta charset="utf-8">
         <title>Login</title>
  </head>
  <body>
      <form action="index.php" method="POST">
          <input type="text" name="usuario" id="" placeholder="Usuário">
            </br>
          <input type="password" name="senha" id="" placeholder="Senha">
            </br>
          <button type="submit" value="Enviar" >Enviar</button>
      </form>
  </body>

</html>  