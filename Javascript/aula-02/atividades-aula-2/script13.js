//Crie uma div com um tamanho de 300px por 300px e cor azul. Ao passar o mouse sobre
//ela, a cor deve mudar para vermelho e o tamanho aumentar. Quando o mouse sair da
//área, a cor deve voltar ao normal e o seu tamanho também.

var a = window.document.getElementById('bloco')
a.addEventListener('click', clicar)
a.addEventListener('mouseenter', entrar)
a.addEventListener('mouseout', sair)

function clicar(){
    a.innerText = 'Clicou'

}

function entrar(){
    a.innerText = 'Entrou'   
    a.style.background = "red"
    a.style.height = "500px"
    a.style.width = "500px"
}

function sair(){
    a.innerText = 'Saiu'
    a.style.background = "green"
    a.style.height = "300px"
    a.style.width = "300px"
}