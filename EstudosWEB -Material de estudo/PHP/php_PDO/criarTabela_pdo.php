<?php 
  
  try {
      $conexao = new PDO('mysql:host=localhost;dbname=php_banco_pdo','root','');

                //criando a tabela 
        $query = '
        create table if not exists tb_usuarios(
            id int not null primary key auto_increment,
            nome varchar(50)not null,
            email varchar(100)not null,
            senha varchar(32)not null
        )       
        
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