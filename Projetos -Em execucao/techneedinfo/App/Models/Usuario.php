<?php

namespace App\Models;
use MF\Model\Model;

class Usuario extends Model{

    private $id;
    private $usuario;
    private $senha;

   
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
         $this->$atributo = $valor;
    }
    
    
    //verifica se usuario e senha do Front tem no BD
     public function autenticar(){
        $query="SELECT id,usuario,senha FROM `usuarios_autenticados` WHERE usuario =:usuario AND senha =:senha";
        $stmt=$this->db->prepare($query);
        $stmt->bindValue(":usuario",$this->__get('usuario'));
        $stmt->bindValue(":senha",$this->__get('senha'));
        $stmt->execute();
        $usuario= $stmt->fetch(\PDO::FETCH_ASSOC); 

        if( !empty($usuario['id']) && !empty($usuario['usuario'])) {           
                $this->__set("id",$usuario["id"]);   
                $this->__set("usuario",$usuario["usuario"]);                   
        }        
        return $this;
    }
    //verifica se campos foram preenchidos
    public function validar(){
        $valido=true;

        if (strlen($this->__get("usuario") || $this->__get("senha"))  <3) {
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
  
    public function getAll(){
        $query="SELECT id,nome,email FROM usuarios WHERE nome LIKE :nome";
        $stmt= $this->db->prepare($query);
        $stmt->bindValue(':nome','%'.$this->__get('nome').'%');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function mostrar(){
        return $this->__get('senha');
    }

    
}




    ?>