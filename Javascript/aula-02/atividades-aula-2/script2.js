//Desenvolva um programa que contenha uma função que receba um número 
//como parâmetro e ao clicar no botão ele valide se o valor é par ou ímpar

function alertaDeClique(){
    var number= Number.parseInt(number);
    var number= document.getElementById("number").value;

    if (number % 2 == 0)
    document.getElementById("num").innerHTML= "Número par";
    else
    document.getElementById("num").innerHTML= "Número impar";
}