<?php
/* este daria erro
$produto=null;
$produto?->criar();
*/
class Funcionario{
    public function __construct(
        private string $nome="",
        private float $salario= 0){}

    public function info(){
        return "Nome: $this->nome - Salário: $this->salario";
    }
}
class FolhaPagamento{
       // private $funcionarios = null;

        public function __construct(){
            $this->funcionarios=[
                new Funcionario('Maria',12000), 
                new Funcionario('Fernando',9200),
                new Funcionario('Ana',5400),
                new Funcionario('Paulo',7200),
            ];
        }
        public function getTotalFuncionarios(){
            return count($this->funcionarios);
        }
        public function getFuncionario($atr){
            return $this->funcionarios[$atr];
        }
    }           

    

    $folhaPagamento=new FolhaPagamento();

   // echo"<H1>". $folhaPagamento->getFuncionario();
    echo'<pre>';
    print_r($folhaPagamento?->getFuncionario(2));
    print_r($folhaPagamento?->getFuncionario(0)?->info());


?>  
