//Crie um programa que solicite ao usuário um nome de usuário e uma senha. Se o nome
//de usuário for admin e a senha for 12345, exiba uma mensagem de boas-vindas; caso
//contrário, exiba uma mensagem de erro.
//

function verificar() {
    var login = document.getElementById("login").value;

    var senha = document.getElementById("senha").value; 
    senha = Number.parseInt(senha);

    if (login === "admin" && senha === 12345) {
        document.getElementById("resposta").innerHTML = "Bem vindo!";
    } else {
        document.getElementById("resposta").innerHTML = "Erro.";   
    }
}
