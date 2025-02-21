var cartoes = [];

function adicionarCartao() {
    var nomeInput = document.getElementById("nomeInput");
    var descricaoInput = document.getElementById("descricaoInput");

    var nome = nomeInput.value.trim();
    var descricao = descricaoInput.value.trim();

    if (nome !== "" && descricao !== "") {
        var cartao = {
            nome: nome,
            descricao: descricao
        }
        cartoes.push(cartao);
        atualizar();
    }

    nomeInput.value = "";
    descricaoInput.value = "";
}

function atualizar() {
    var cartoesLista = document.getElementById("cartoesLista");
    cartoesLista.innerHTML = "";

    for (var i = 0; i < cartoes.length; i++) {
        var div = document.createElement("DIV");
        div.innerHTML = "<strong>" + cartoes[i].nome + "</strong>: " + cartoes[i].descricao;

        var botaoExcluir = document.createElement("button");
        botaoExcluir.textContent = "Excluir";
        botaoExcluir.onclick = (function(index) {
            return function() {
                excluirCartao(index);
            };
        })(i);

        div.appendChild(botaoExcluir);
        cartoesLista.appendChild(div);
    }
}

function excluirCartao(index) {
    cartoes.splice(index, 1);
    atualizar();
}

