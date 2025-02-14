//Crie um programa que pergunte a idade do usuário e informe se ele é maior de idade ou menor de idade.

function verificar(){
    var idade= Number.parseInt(idade);
    var idade= document.getElementById("idade").value;

    if (idade >= 18)
    {
    document.getElementById("id").innerHTML= "Maior de idade.";
    }

    else
    {
    document.getElementById("id").innerHTML= "Menor de idade";   
    }
}