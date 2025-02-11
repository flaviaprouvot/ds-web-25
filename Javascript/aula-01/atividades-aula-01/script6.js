/*Escreva em JavaScript um programa que informe o retorno de um investimento (montante) com base nos valores do capital inicial,
tempo em meses e taxa de juros mensal, fornecidos pelo usuário. Use a fórmula: M = C * (1+i)** t
*/

var n1 = Number.parseInt  (prompt("Digite seu capital inicial: "));
var n2 = Number.parseInt  (prompt("Digite a taxa de juros, em percentual: "));
var n3 = Number.parseInt  (prompt("Digite seu tempo do investimento, em meses: "));
var resultado = (n1 * ((1 + (n2/ 100)) ** n3));
alert(resultado.toFixed(2));

