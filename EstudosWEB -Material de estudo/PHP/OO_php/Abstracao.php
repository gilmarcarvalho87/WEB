<?php 
    
    class Funcionario{
        //atributos
        public  $nome =null;
        public  $numFilhos = null;
        public  $telefone = null;
        public  $cargo = null;
        public  $salario = null;


        //getters/setters
        function setNome($nome){
           $this->nome=$nome;
        }
        function setNumFilhos($numFilhos){
           $this->numFilhos = $numFilhos;
        }
        function getNome(){         
            return $this->nome;
        }
        function getNumFilhos(){
            return $this->  numFilhos;
        }

        function resumoFuncionario(){
            if (($this->getNumFilhos()) == 1) {
               $txtfilho= " filho.";
            }else{
                $txtfilho= " filhos.";
            }
            return 'O funcionário '.$this->getNome().' tem '
            .$this->getNumFilhos().$txtfilho;
        }
        
    } 
             //instancias
            $func1 = new Funcionario();            
            $func2 = new Funcionario();            
            
            $func1 -> setNome('João da Silva');                  
            $func1 -> setNumFilhos(2);         
            echo $func1->resumoFuncionario();
            echo'<hr>';
           
            $func2 -> setNome('Gilmar Carvalho');                  
            $func2 -> setNumFilhos(1);        
            echo $func2->resumoFuncionario();
            echo'<hr>';

          
           


      

            



    ?>