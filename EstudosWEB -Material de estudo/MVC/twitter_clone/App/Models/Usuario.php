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
    $query="INSERT INTO usuarios(id,nome,email,senha)VALUES(:nome,:email,:senha)";
    $stmt= $this->db->prepare($query);
    $stmt->bindValue(":nome",$this->__get('nome'),":email",$this->__get('email'),":senha",$this->__get('senha'));
    $stmt->execute();
        return $this;
    }



    //validar usuario
    //recuperar senha

}



?>