//Crie um programa que peça ao usuário para inserir um número e informe se o número é positivo, negativo ou zero.

function verificar(){
    var numero= Number.parseInt(numero);
    var numero= document.getElementById("numero").value;

    if (numero>0)
    {
    document.getElementById("num").innerHTML= "Número positivo.";
    }

    if (numero<0)
    {
    document.getElementById("num").innerHTML= "Número negativo";   
    }

    if (numero==0)
    {
    document.getElementById("num").innerHTML= "Número igual à zero.";   
    }
}