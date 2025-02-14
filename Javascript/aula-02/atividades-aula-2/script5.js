//Crie uma página com uma div e um botão. Quando o usuário clicar no botão a cor da div muda.
//

function mudar(){
    var box = document.getElementById("box");
    if (box.style.backgroundColor === "aqua") {
        box.style.backgroundColor = "red";
    } else {
        box.style.backgroundColor = "aqua";
    }
}