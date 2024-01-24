<?php
namespace A;
class Cliente implements cadastroInterface{
    public $nome='Victor';

    public function __construct(){
        echo'<pre>';
        print_r(get_class_methods($this));        
    } 

    public function __get($attr){
            return $this -> $attr;
    }
    public function  salvar(){
        echo'Salvo';
    }


}
interface cadastroInterface{
    public function salvar();
}





?>