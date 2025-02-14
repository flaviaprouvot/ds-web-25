//Crie um programa que peça ao usuário para inserir um número e informe se o número é positivo, negativo ou zero.
//

function operacao(){
    var n1= document.getElementById("n1").value;
    n1= Number.parseInt(n1);

    var n2= document.getElementById("n2").value;
    n2= Number.parseInt(n2);

    var op= document.getElementById("op").value;

    if (op === "+")
    {
    document.getElementById("resultado").innerHTML= n1+n2;
    }

    if (op === "-")
    {
    document.getElementById("resultado").innerHTML= n1-n2;   
    }

    if (op === "*")
    {
    document.getElementById("resultado").innerHTML= n1*n2;   
    }

    if (op === "/")
    {
    document.getElementById("resultado").innerHTML= n1/n2;   
    }
}