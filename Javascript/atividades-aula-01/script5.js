//Escreva em JavaScript um programa que realize a conversão de uma temperatura fornecida em graus Fahrenheit (F) para Celsius (C).
//Dica: para converter uma temperatura em F para C, subtraia 32 da temperatura e multiplique o resultado por 0,5556 (ou 5/9).

var n = Number.parseFloat  (prompt("Digite a temperatura em F que deseja converter para C: "));
alert((n-32)*(5/9));