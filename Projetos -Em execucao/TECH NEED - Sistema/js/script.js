
let fundo=document.body;
let botaoTurno= document.getElementById("botaoTurno");
let imgBotaoTurno=document.getElementById("imgBotaoTurno");
let noite=true;

function turno(){  
    while(true){
        if(noite) {
                imgBotaoTurno.style.background="url(img/icons/moon-stars.svg) no-repeat";    
                fundo.style.background="#fff";        
                noite=false;
                break;
            }if(noite === false){
                imgBotaoTurno.style.background="url(img/icons/sun-fill.svg) no-repeat";                   
                fundo.style.background = " linear-gradient(90deg,#000,rgb(2, 152, 233),black)"; 
                noite=true;
                break;
           }      

    }
}
function imprimir() {
    document.getElementById('tela').innerHTML=window.print();
}

/*FORM CADASTRO*/ 
function enviarCadastro() {
    alert("Enviado");
}


/*CEP*/ 
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
  
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('uf').value=(conteudo.uf);
    
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";
    

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};