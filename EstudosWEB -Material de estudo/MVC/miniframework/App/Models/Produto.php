<?php

namespace App\Models;



class Produto{

    protected $db;
   


    public function __construct(\PDO $db)
    {
        $this->db= $db;
    }

    public function getProdutos(){     
        $query="SELECT id,descricao,preco FROM `tb_produtos` WHERE 1";            
        return $this->db->query($query)->fetchAll();          
              
        
    }











}




?>