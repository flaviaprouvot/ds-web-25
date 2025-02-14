//Crie um programa com uma função que receba uma string como parâmetro e
//retorne a mesma string com todas as letras em caixa alta. Utilize essa função para
//converter diferentes strings. 
//

function alertaDeClique(){
    var text = document.getElementById("text").value;
    text = text.toUpperCase(); 
    document.getElementById("palavra").innerHTML= text;

}