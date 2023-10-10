
//Capturando a posicao da tela
var largura = 0;
var altura = 0;
var vidas = 1;

function capturaTamanhoTela(){
    //captura da posicao da tela
    altura = window.innerHeight;
    largura = window.innerWidth;
    console.log("largura x ="+largura+"  "+"altura y= "+altura)
}   
function posicaoRandomica(){

    //remocao de mosquitos   
    if(document.getElementById('mosquito')) {
             document.getElementById('mosquito').remove();
       if(vidas < 4){ ; 
            document.getElementById("v"+vidas).src="img/coracao_vazio.png";
            vidas++
            } else{
            alert("Game Over")
            }
         
    }     
    

    //posicao randomica
    var posicaoY= Math.floor(Math.random()*altura)-90;
    var posicaoX= Math.floor(Math.random()*largura)-90;
    console.log(posicaoX,posicaoY)

    //se hover posicao negativa alterará para posicao inicial 0
    posicaoY= posicaoY < 0 ? 0 : posicaoY
    posicaoX= posicaoX < 0 ? 0 : posicaoX

    //criando mosca na tela via script
    var mosquito = document.createElement("img");
    mosquito.src ="img/mosca.png";   
    mosquito.id="mosquito";
  
    mosquito.className=tamanhoAleatorio() +"  "+ladoAleatorio();    
    mosquito.style.position="absolute";
    mosquito.style.left= posicaoX+"px";
    mosquito.style.top= posicaoY+"px";

    //add mosquito na tela
    document.body.appendChild(mosquito);
    //chamada da funcao
    ladoAleatorio();

   
}
function tamanhoAleatorio() {
    var classe = Math.floor(Math.random() * 3)
   
    switch (classe) {
        case 0:      return 'mosca1'; 
        case 1:      return 'mosca2';
        case 2:      return 'mosca3';
        }
  
} 
function ladoAleatorio() {
    var classe = Math.floor(Math.random() * 2)
    
    switch (classe) {
        case 0:      return 'ladoA';
        case 1:      return 'ladoB';
    }
  
} 

//chamada de criaçao de mosquitos com o tempo 1000 segundos
setInterval(() => {posicaoRandomica()}, 1000);

