//Crie um programa que peça ao usuário inserir os comprimentos de três lados de um
//triângulo e determine se é um triângulo válido (a soma de dois lados é maior que o terceiro)
//e, se for, classifique-o como equilátero, isósceles ou escaleno.

function verificar(){

    var lado1= document.getElementById("lado1").value;
    lado1= Number.parseInt(lado1);
    
    var lado2= document.getElementById("lado2").value;
    lado2= Number.parseInt(lado2);
    
    var lado3= document.getElementById("lado3").value;
    lado3= Number.parseInt(lado3);
    
    
    if (lado1+lado2>lado3)
    {
       if (lado1 === lado2 && lado2 === lado3 && lado3 === lado1)
        {
        document.getElementById("resultado").innerHTML= "O triângulo é válido e equilátero.";   
        }

        if (lado1 != lado2 && lado2 != lado3 && lado3 != lado1)
        {
        document.getElementById("resultado").innerHTML= "O triângulo é válido e escaleno.";   
        }

        if (lado1 != lado2 && lado2 == lado3 ||lado2 != lado1 && lado1 == lado3 || lado3 != lado2 && lado2 == lado1 )
        {
        document.getElementById("resultado").innerHTML= "O triângulo é válido e isóceles.";   
        }
    }
    

    
    else
    {
    document.getElementById("resultado").innerHTML= "Triângulo inválido.";   
    }
    
    }