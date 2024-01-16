<?php

interface EquipamentosEletronicosInterface{
    public function ligar();
    public function desligar();
}
//---------------------------------------
class Geladeira implements EquipamentosEletronicosInterface{       
        public function abrirPorta(){
            echo 'Abriu a geladeira';
        }  
        public function ligar(){
            echo'Ligou';
        }
        public function desligar(){
            echo'Desligou';
        }
      
}
class TV implements EquipamentosEletronicosInterface{      
        public function trocarcanal(){
            echo'Trocou de canal';
        }  public function ligar(){
            echo'Ligou';
        }
        public function desligar(){
            echo'Desligou';
        }
}

$x = new TV();
$y = new Geladeira();





?>