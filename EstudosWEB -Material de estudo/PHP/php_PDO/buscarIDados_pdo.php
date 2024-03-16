<?php 
  
  try {
      $conexao = new PDO('mysql:host=localhost;dbname=php_banco_pdo','root','');

                //criando a tabela 
        $query = 'select * from tb_usuarios';
        
        
        
      $stmt=$conexao -> query($query);

      /*retorna todos em forma de ARRAY com o FetchAll
      $usuario=$stmt->fetchAll();
        echo '<pre>';
        print_r($usuario);
        echo '</pre>';
     */


      /*retorna todos os OBJETOS com o FetchAll
      $usuario=$stmt->fetchAll(PDO::FETCH_OBJ);
      echo '<pre>';
      print_r($usuario);
      echo '</pre>';
      */

     
      /* retona somente um item do ARRAY no caso o primeiro indice. CASO queira um especifico so por um where na query buscando pelo id desejado 
      $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
      echo '<pre>';
      print_r($usuario);
      echo '</pre>';
      */
  
      // retona somente um item do OBJETO no caso o primeiro indice. CASO queira um especifico so por um where na query buscando pelo id desejado 
     
       $usuario=$stmt->fetch(PDO::FETCH_OBJ);
        echo '<pre>';
        print_r($usuario);
        echo '</pre>';
    
     
      
     

        
        
  } catch (PDOException  $e) {
        echo '<h2>Erro ao conectar ao banco de dados</h2>';
       $code= $e ->getCode();
       $msg= $e ->getMessage();       
            echo'<strong>Código do erro:</strong>'.$code;
            echo'</br><strong>Mensagem do erro:</strong>'.$msg;  
  }

?>  