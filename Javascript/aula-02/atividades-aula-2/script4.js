//Crie um programa e uma função que receba um valor e uma porcentagem como
//parâmetros. A função deve retornar o valor acrescido da porcentagem indicada.
//

function calcular(){
    var numero1= document.getElementById("numero1").value;
    var numero2= document.getElementById("numero2").value;

    var numero1= Number.parseFloat(numero1);
    var numero2= Number.parseFloat(numero2);

    var result= (numero1 + (numero1/numero2));

    document.getElementById("resultado").innerHTML= result;

}