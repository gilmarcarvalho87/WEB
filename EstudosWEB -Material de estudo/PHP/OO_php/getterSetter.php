<?php 
    
    class Funcionario{
        //atributos    
            public  $nome =null;
            public  $numFilhos = null;
            public  $telefone = null;
            public  $cargo = null;
            public  $salario = null;
    
      
        //getters/setters overloading
        function __set($atributo,$valor){
                $this->$atributo = $valor;
        }
        function __get($atributo){
            return $this->$atributo;
        }
    

        function resumoFuncionario(){         
           return   '<h4>Funcionario: '  .$this->nome .'<br> '.
                    'Numeros de filhos: '.$this->numFilhos.'<br> '.         
                    'Telefone: '         .$this->telefone.'<br> '.        
                    'Cargo: '            .$this->cargo.'<br> '.        
                    'Salário: '          .$this->salario.'<br> ';        
        }
        
    } 
             //instancias
            $func1 = new Funcionario();            
            $func2 = new Funcionario();            
          
            
            $func1 -> __set('nome','João da Silva');                  
            $func1 -> __set('numFilhos',2);         
            $func1 -> __set('telefone',49988888888);         
            $func1 -> __set('cargo','Supervisor');         
            $func1 -> __set('salario',5000);       
            $func1 -> __set('salario',6000);              
            echo $func1 -> resumoFuncionario();         
            echo'<hr>';

            $func2 -> __set('nome','Aline da Silva');                  
            $func2 -> __set('numFilhos',1);         
            $func2 -> __set('telefone',49988888888);         
            $func2 -> __set('cargo','Peão');         
            $func2 -> __set('salario',1000);     
            echo $func2 -> resumoFuncionario();           
            echo'<hr>';
           


      

            



    ?>