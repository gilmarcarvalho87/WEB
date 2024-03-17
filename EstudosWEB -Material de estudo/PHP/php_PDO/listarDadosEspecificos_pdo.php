<?php 
  
  try {
      $conexao = new PDO('mysql:host=localhost;dbname=php_banco_pdo','root','');              
        $query = 'select * from tb_usuarios';
        /*
        //PRIMEIRA OPCAO DE LISTAR
        $stmt=$conexao -> query($query);
        $lista_usuarios = $stmt -> fetchAll(PDO::FETCH_OBJ);
        echo "<pre>";
            print_r($lista_usuarios);
        echo "</pre>";
        */

        //SEGUNDA OPCAO DE LISTAR 
        foreach ($conexao -> query($query) as $key => $value) {            
            echo "<h4>". $key."          ". $value[1]."       ". $value[2]."           ". $value[3];
            echo "<hr>";
        }        
        
        
        
        
        


        
        
  } catch (PDOException  $e) {
        echo '<h2>Erro ao conectar ao banco de dados</h2>';
       $code= $e ->getCode();
       $msg= $e ->getMessage();       
            echo'<strong>Código do erro:</strong>'.$code;
            echo'</br><strong>Mensagem do erro:</strong>'.$msg;  
  }

?>  