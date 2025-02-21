//Crie um botão que conte quantas vezes foi clicado e exiba essa contagem na página.

let contador = 0;
function contar() {

    contador++;
    document.getElementById("contador").innerHTML = contador;
}