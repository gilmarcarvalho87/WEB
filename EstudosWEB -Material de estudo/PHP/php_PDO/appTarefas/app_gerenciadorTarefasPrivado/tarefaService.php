<?php
 class TarefaService{
      private $tarefa;
      private $conexao;

   public function __construct(Conexao $conexao, Tarefa $tarefa){
         $this->conexao=$conexao->conectar();
         $this->tarefa=$tarefa;
   }
    public function inserir(){           
            $query="insert into tb_tarefas(tarefa)values(:tarefa)";          
            $stmt = $this->conexao->prepare($query);               
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));               
            $stmt->execute();             
              

    }
    public function recuperar(){}
    public function atualizar(){}
    public function deletar(){} 
 }
?>