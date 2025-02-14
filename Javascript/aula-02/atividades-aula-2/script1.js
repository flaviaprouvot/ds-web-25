//Crie um programa com uma função que receba o nome da pessoa e de uma
//mensagem boas-vindas para o usuário quando clicar no botão. Utilize essa função
//para personalizar a experiência de cada usuário.
//

function alertaDeClique(){
    var nome= document.getElementById("nome").value;
    document.getElementById("name").innerHTML= "Seja bem vindo " + nome;
}