<?php



	class Dashboard implements JsonSerializable{
		
		//variaveis
		 private $data_inicio;
		 private $data_fim;
		 private $numeroVendas; 
		 private $totalVendas; 
		 private $clienteAtivo; 
		 private $clienteInativo; 	
		 private $total_despesas; 	
		

		public function jsonSerialize(){
			 return [
				 'data_inicio'=> $this->__get('data_inicio'),
				 'data_fim'=>$this->__get('data_fim'),
				 'numeroVendas'=>$this->__get('numeroVendas'),
				 'totalVendas'=>$this->__get('totalVendas'),
				 'clienteAtivo'=>$this->__get('clienteAtivo'),
				 'clienteInativo'=>$this->__get('clienteInativo'),
				 'total_despesas'=>$this->__get('total_despesas'),
				 
			 ];
		 }
		//metodos publicos
		public function __get($atributo){
			return $this->$atributo;
		}
		public function __set($atributo,$valor){
			 $this->$atributo = $valor;
			 return $this;
		}

	}
	//Conexao com o BD
	class Conexao{

		private $host='localhost';
		private $dbname='dashboard';
		private $user='root';
		private $pass='';


		 public function conectar(){
		 	try {

		 		$conexao = new PDO(
		 			"mysql:host=$this->host;dbname=$this->dbname",
		 			"$this->user",
		 			"$this->pass"
		 		);
		 		$conexao->exec('set charset utf8');
				
		 		return $conexao;
		 		
			 	}catch (PDOException $e) {
			 		echo("<span class='Display-4'>Erro !! Não foi possivel conectar no Banco de Dados.");		 		
			 	}
		}

	}
	//classe Model
	class Bd{
		//Variaveis
		private $conexao;
		private $dashboard;

		//Construtor
		public function __construct(Conexao $conexao,Dashboard $dashboard){
			$this->conexao = $conexao->conectar();
			$this->dashboard = $dashboard;  
		}

		//Funcoes
		public function getNumeroVendas(){	
	  	$query = "select count(*) as numero_vendas from tb_vendas where data_venda between :data_inicio and :data_fim ";

		$stmt = $this->conexao->prepare($query);	
		$stmt->bindValue(':data_inicio',$this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim',$this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
		}

		public function getTotalVendas(){	
	  	$query ='select 
				SUM(total) as total_vendas 
			from 
				tb_vendas 
			where 
				data_venda between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio',$this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim',$this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		public function getClientesAtivos(){			
		$query ='SELECT COUNT(*)as cliente_ativo FROM `tb_clientes` WHERE cliente_ativo=1';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();  
		return $stmt->fetch(PDO::FETCH_OBJ)->cliente_ativo;
		}	
		public function getClienteInativo(){			
		$query ='SELECT COUNT(*)as clienteInativo FROM `tb_clientes` WHERE cliente_ativo=0';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();  
		return $stmt->fetch(PDO::FETCH_OBJ)->clienteInativo;
		}	

		public function getTotalDespesas(){			
		$query ='select SUM(total) as total_despesas FROM `tb_despesas` WHERE data_despesa BETWEEN :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio',$this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim',$this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}	
	
}
	//logica script
	$dashboard= new Dashboard();
	$conexao=new Conexao();
	$bd=new Bd($conexao,$dashboard);

	//captacao do front para o backend.
	$competencia= explode('-', $_GET['competencia']);
	$ano=$competencia[0];
	$mes=$competencia[1];
	$dias_do_mes= cal_days_in_month(CAL_GREGORIAN,$mes,$ano);


	$dashboard->__set('data_inicio',$ano.'-'.$mes.'-01'	);
	$dashboard->__set('data_fim',$ano.'-'.$mes.'-'.$dias_do_mes);	

	$dashboard->__set('numeroVendas',$bd->getNumeroVendas());
	$dashboard->__set('totalVendas',$bd->getTotalVendas());
	$dashboard->__set('clienteAtivo',$bd->getClientesAtivos());
	$dashboard->__set('clienteInativo',$bd->getClienteInativo());
	$dashboard->__set('total_despesas',$bd->getTotalDespesas());
	
	
	echo json_encode($dashboard);

	

	

	

		











?>