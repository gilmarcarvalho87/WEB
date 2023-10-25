class Despesa{
    constructor(ano,mes,dia,tipo,descricao,valor){
        this.ano = ano;
        this.mes = mes;
        this.dia = dia;
        this.tipo = tipo;
        this.descricao = descricao;
        this.valor = valor; 
  
    }


}
function cadastrarDespesas(){
    
 let ano = document.getElementById('ano').value;
 let mes = document.getElementById('mes').value;
 let dia = document.getElementById('dia').value;
 let tipo = document.getElementById('tipo').value;
 let descricao = document.getElementById('descricao').value;
 let valor = document.getElementById('valor').value;

 let despesa = new Despesa();

 gravar(despesa)
}
function gravar(d) {
    localStorage();
}