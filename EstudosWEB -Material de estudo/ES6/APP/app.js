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
        
        //recupera todas as dispesas do local storage pelo numero do indice dele
        for (let i= 1; i <= id; i++) {

         //Transforma um json em literal e armazena em despesas 
         let despesa = JSON.parse(localStorage.getItem(i))
          
            if(despesa === null){
                continue
            }
            //adiciona a despesa ao array
            despesas.push(despesa)       
        }
        //faz o retorno onde seja chamado dos itens da lista
        return despesas
    
    }
    pesquisar(despesa){
        console.log(despesa)
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

                //limpa todos os campos
                ano = document.getElementById('ano').value=""
                mes = document.getElementById('mes').value=""
                dia = document.getElementById('dia').value=""
                tipo = document.getElementById('tipo').value=""
                descricao = document.getElementById('descricao').value=""
                valor = document.getElementById('valor').value=""  
           
            
           

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
    let despesas = []

     despesas= bd.recuperarTodosRegistros()    
        //seleciona a tag que será manipulada
         let listaDespesas=document.getElementById('listaDespesas')

        //percorre todo o array 
         despesas.forEach(function(d){
          
            //criacao da linha da tabela de forma dinamica
           let linha= listaDespesas.insertRow()
                //criacao de cada celula da esquerda pra direita conforme a necessidade
            linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`

            //ajusta o tipo conforme o numero
                switch (d.tipo) {
                    case '1': d.tipo = "Alimentação"    
                     break;
                    case '2': d.tipo = "Educação"    
                      break;
                    case '3': d.tipo = "lazer"    
                     break;
                    case '4': d.tipo = "Saúde"    
                     break;
                     case '5': d.tipo = "Transporte"    
                     break;
            
                
                    default:
                        break;
                }

                linha.insertCell(1).innerHTML = d.tipo
                linha.insertCell(2).innerHTML = d.descricao
                linha.insertCell(3).innerHTML = d.valor
      
    
















        })


   
}
function pesquisarDespesas(){
    let ano = document.getElementById('ano').value;
    let mes = document.getElementById('mes').value;
    let dia = document.getElementById('dia').value;
    let tipo = document.getElementById('tipo').value;
    let descricao = document.getElementById('descricao').value; 
    let valor = document.getElementById('valor').value
   
    let despesa = new Despesa(ano,mes,dia,tipo,descricao,valor)
    
    bd.pesquisar(despesa)
}