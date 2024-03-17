<?php 

    if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
        
    
  
        try {
        $conexao = new PDO('mysql:host=localhost;dbname=php_banco_pdo','root','');              
        $query = "select * from tb_usuarios where";
        $query .="email = :usuario"; 
        $query .="AND senha = :senha"; 

        $stmt = $conexao ->query($query);

        $stmt->bindValue(':usuario', $_POST['usuario']);
        $stmt->bindValue(':senha', $_POST['senha']);

        $stmt ->execute();
        $usuario ->fetch($query);
        
        echo'<pre>';
            print_r($usuario);
        echo'</pre>';        
        
       }      
        
    }
    catch(PDOException  $e){
            echo '<h2>Erro ao conectar ao banco de dados</h2>';
        
    }
?> 

<html>
  <head>
         <meta charset="utf-8">
         <title>Login</title>
  </head>
  <body>
      <form action="SqlInjection_Prepare_pdo.php" method="post">
          <input type="text" name="" id="" placeholder="Usuário">
            </br>
          <input type="password" name="" id="" placeholder="Senha">
            </br>
          <button type="submit" value="Enviar" >Enviar</button>
      </form>
  </body>

</html>  