<?php
 
require"../../app_gerenciadorTarefasPrivado/conexao_pdo.php";
require"../../app_gerenciadorTarefasPrivado/tarefaModel.php";
require"../../app_gerenciadorTarefasPrivado/tarefaService.php";

$acao = isset($_GET['acao'])? $_GET['acao'] : $acao;

if($acao == 'inserir') {    
        
            $tarefa = new Tarefa();
        //salva o valor que vem do front e salva na variavel

        $tarefa->__set('tarefa',$_POST['tarefa']);

        $conexao =new Conexao();
        //recebera retorno da conexao e a tarefa  a ser executada
        $tarefaService =new TarefaService($conexao,$tarefa);

        $tarefaService->inserir();
        header("location:nova_tarefa.php?inclusao=1"); 
        
} else if($acao == 'recuperar'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao,$tarefa);
        $tarefas = $tarefaService->recuperar();
}


?> 