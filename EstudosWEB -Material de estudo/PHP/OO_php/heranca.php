<?php 

class Veiculo{
    public $placa='null';
    public $cor='null';

    function acelerar(){
        echo'Acelerou';
    }
    function freiar(){
        echo'Freiou.';
    }
    function trocarMarcha(){
        echo'Trocou Marcha com a mão.';
    }


}
    class Carro extends Veiculo{      
        //variaveis
        public $teto_solar=true;

        //construtor
        public function __construct($placa,$cor) {
            $this->placa = $placa;
            $this->cor   = $cor;
        }

        
        function abrirTetoSOlar(){
            echo'Abriu o teto.';
        }
        function alterarPosicaoVolante(){
            echo'Mudou posição do volante.';
        }
    }
    class Moto extends Veiculo{      
        public $contraPesoGuidao=true;

        //CONSTRUTOR
        public function __construct($placa,$cor) {
            $this->placa = $placa;
            $this->cor   = $cor;
        }

   
        function empinar(){
            echo'Empinou.';
        }
        function trocarMarcha(){
            echo'Trocou Marcha com o pé esquerdo.';
        }

    }
    class Caminhao extends Veiculo{
    }
    


    //Instancias
    $carro =new Carro('ABC2524','BRANCO');
    $moto  =new Moto('MYJ2444','PRETO');
    $caminhao = new Caminhao();

 
   
    
    echo '<pre>';
    print_r($carro);
    echo'<br>';

    print_r($moto);
    echo '</pre><hr>';
    

    $carro ->acelerar();
    echo'<br>';
    $carro ->abrirTetoSOlar();
    echo'<br>';
    $carro ->alterarPosicaoVolante();
    echo'<br><hr>';

    $moto ->acelerar();
    echo'<br>';
    $moto ->empinar();
    $moto -> freiar();
    echo'<br>';
    $carro -> trocarMarcha();
    echo'<br>';
    $moto -> trocarMarcha();

    echo'<br>';
    $caminhao -> trocarMarcha();
        

  

?>