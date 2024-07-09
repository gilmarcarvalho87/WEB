<?php

namespace App\Models;

use MF\Model\Model;


class Produto extends Model{  

    public function getProdutos(){     
        $query="SELECT id,descricao,preco FROM `tb_produtos` WHERE 1";            
        return $this->db->query($query)->fetchAll();        
              
        
    }

}




?>