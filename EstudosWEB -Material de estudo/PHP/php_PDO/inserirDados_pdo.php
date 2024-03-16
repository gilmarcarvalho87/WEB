<?php 
  
  try {
      $conexao = new PDO('mysql:host=localhost;dbname=php_banco_pdo','root','');

                //criando a tabela 
        $query = 'insert into tb_usuarios(nome,email,senha)
         values 
         ("Gilmar carvalho","gilmrcarvalho@gmail.com",1234),    
         ("Jorge Sant","jorgesant@gmail.com",76545),     
         ("Giovanni","vani@gmail.com",87689900),      
         ("Grabriel ","biel@gmail.com",65489),      
         ("Rafael","rafa@gmail.com",998887)
         ';

         
        $conexao ->exec($query);
        
        
        
  } catch (PDOException  $e) {
        echo '<h2>Erro ao conectar ao banco de dados</h2>';
       $code= $e ->getCode();
       $msg= $e ->getMessage();       
            echo'<strong>Código do erro:</strong>'.$code;
            echo'</br><strong>Mensagem do erro:</strong>'.$msg;  
  }

?>  