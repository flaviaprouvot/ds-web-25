function adicionarCartao() {
    const nome = document.getElementById('nomeInput').value;
    const descricao = document.getElementById('descricaoInput').value;

    if (nome && descricao) {
        const cartao = document.createElement('div');
        cartao.className = 'cartao';

        const conteudo = document.createElement('div');
        conteudo.innerHTML = `<strong>${nome}</strong><p>${descricao}</p>`;
        cartao.appendChild(conteudo);

        const botaoExcluir = document.createElement('button');
        botaoExcluir.innerText = 'Excluir';
        botaoExcluir.onclick = function() {
            cartoesLista.removeChild(cartao);
        };
        cartao.appendChild(botaoExcluir);

        document.getElementById('cartoesLista').appendChild(cartao);

        document.getElementById('nomeInput').value = '';
        document.getElementById('descricaoInput').value = '';
    } 
}