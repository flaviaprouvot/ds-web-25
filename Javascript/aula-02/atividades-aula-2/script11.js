//Crie um programa que solicite ao usuário três números e informe qual deles é o maior.
//

function verificar(){

var n1= document.getElementById("n1").value;
n1= Number.parseInt(n1);

var n2= document.getElementById("n2").value;
n2= Number.parseInt(n2);

var n3= document.getElementById("n3").value;
n3= Number.parseInt(n3);


if (n1>n2 && n1>n3)
{
document.getElementById("resultado").innerHTML= "O primeiro número é o maior.";
}

if (n2>n1 && n2>n3)
{
document.getElementById("resultado").innerHTML= "O segundo número é o maior.";   
}

if (n3>n2 && n3>n1)
{
document.getElementById("resultado").innerHTML= "O terceiro número é o maior.";   
}

}