<?php

namespace App\Models;
use MF\Model\Model;

class Usuario extends Model{

    private $id;
    private $nome;
    private $email;
    private $senha;

   
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
         $this->$atributo = $valor;
    }
    
    
    //salvar usuario
    public function salvar(){         
    $query="INSERT INTO usuarios(nome,email,senha)VALUES(:nome,:email,:senha)";
    $stmt= $this->db->prepare($query);
    $stmt->bindValue(":nome",$this->__get('nome'));
    $stmt->bindValue(":email",$this->__get('email'));
    $stmt->bindValue(":senha",$this->__get('senha'));
    $stmt->execute();
        return $this;
    }
    //verifica se campos foram preenchidos
    public function validar(){
        $valido=true;

        if (strlen($this->__get("nome")) < 3  || strlen($this->__get("email")) < 3 ||  strlen($this->__get("senha")) < 3) {
               $valido=false;
        }
        return $valido;
    }
    //verifica se ja existe no banco
     public function getUsuarioPorEmail(){
        $query="SELECT nome,email FROM `usuarios` WHERE  email= :email";
        $stmt= $this->db->prepare($query);      
        $stmt->bindValue(":email",$this->__get('email'));       
        $stmt->execute();
          return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        }    
      
    
    
    
    
    
    }

    ?>