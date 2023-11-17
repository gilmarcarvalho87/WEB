class Despesa{
    constructor(ano,mes,dia,tipo,descricao,valor){
        this.ano = ano;
        this.mes = mes;
        this.dia = dia;
        this.tipo = tipo;
        this.descricao = descricao;
        this.valor = valor; 
  
    }
    validarDados(){
        //verifica se os dados sao validos
        for(let i in this){
             if (this[i] == "" || this[i] == null || this[i] == undefined) {               
                return false;
             }
           
         }        
        
        return true;
        
    }
 

}
class BD{
   
    constructor(){
        let id = localStorage.getItem("id");

        if(id === null){
                                   //chave,valor
            id = localStorage.setItem("id",0)
        }
    }
    getProximoId(){
        //pega o valor e acrescenta mais 1 e retorna
        let proximoId= localStorage.getItem("id")
        return(parseInt(proximoId)+1) 
    }
    gravar(d){
   
       let idAtualizado = this.getProximoId()

       
       localStorage.setItem(idAtualizado, JSON.stringify(d))
       localStorage.setItem("id",idAtualizado)
    }
    recuperarTodosRegistros(){
        let despesas = Array()

        let id= localStorage.getItem("id")
        
        //recupera todas as dispesas do local estorage pelo numero do indice dele
        for (let i= 1; i <= id; i++) {

            //Transforma um json em literal
         let despesa = JSON.parse(localStorage.getItem(i))
          
         despesas.push(despesa)

         console.log(despesas)


        }
    
    }
    
}
let bd = new BD;


function cadastrarDespesas(){  
 let ano = document.getElementById('ano').value;
 let mes = document.getElementById('mes').value;
 let dia = document.getElementById('dia').value;
 let tipo = document.getElementById('tipo').value;
 let descricao = document.getElementById('descricao').value; 
 let valor = document.getElementById('valor').value




  let despesa = new Despesa(ano,mes,dia,tipo,descricao,valor) 


  if (despesa.validarDados()) {       
        //tornanndo dinamico  
        //seleciona determinada tag html que gostariamos de manipular  
        document.getElementById('modal-title').innerHTML="Parabéns";
        document.getElementById('modal-title').style.color="green"
        document.getElementById('texto-modal').innerHTML="Gravado com Sucesso";
        document.getElementById('modal-botao-voltar').innerHTML="Voltar";
        document.getElementById('modal-botao-voltar').style.color="#fff"
        document.getElementById('modal-botao-voltar').style.background="green"
        
        //grava no localStorage
        bd.gravar(despesa)

        //chama tela modal com seu respectivo nome
        $("#modalRegistraDespesa").modal("show")
  }else{

        document.getElementById('modal-title').innerHTML="Inválido";
        document.getElementById('modal-title').style.color="red"
        document.getElementById('texto-modal').innerHTML="Dados Inválidos ou Inexistentes";
        document.getElementById('modal-botao-voltar').innerHTML="Voltar e Corrigir";
        document.getElementById('modal-botao-voltar').style.background="red"
        
        $("#modalRegistraDespesa").modal("show")
       
  } 
    

    
  
}
function carregaListaDespesas(){
    bd.recuperarTodosRegistros()
}