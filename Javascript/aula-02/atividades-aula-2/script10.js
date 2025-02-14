//Crie um programa que peça ao usuário para inserir um número e informe se é par ou ímpar.
//

function verificar(){
    var number= Number.parseInt(number);
    var number= document.getElementById("number").value;

    if (number % 2 == 0)
    document.getElementById("num").innerHTML= "Número par";
    else
    document.getElementById("num").innerHTML= "Número impar";
}