    <form action="/mvc_php/produto/cadastro" method="POST" name="formulario" onsubmit="return validarDadosProduto();">
    <style>
    form {
        background-color: #e6f2ff; 
        padding: 20px;
        border-radius: 8px;
        width: 400px;
        font-family: Arial, sans-serif;
        border: 1px solid #b3d1ff;
    }

    form label {
        display: block;
        margin-bottom: 5px;
        color: #003366;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #b3d1ff;
        border-radius: 4px;
        box-sizing: border-box;
    }

    form input[type="submit"] {
        background-color: #3399ff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #267acc;
    }
    </style>


        <label>Nome do Produto:</label>
        <input type="text" name="nomeProduto" required>
        <br>
        <label>Preço:</label>
        <input type="number" step="0.01" name="precoProduto" required>
        <br>
        <label>Estoque:</label>
        <input type="number" name="estoqueProduto" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    
    <script>
function validarDadosProduto() {
    let nome = formulario.nomeProduto.value.trim();
    let estoque = formulario.estoqueProduto.value.trim();
    let preco = formulario.precoProduto.value.trim();

    // Cria mensagens de erro dinamicamente
    let erros = document.querySelectorAll('.erro-input');
    erros.forEach(erro => erro.remove());

    // Validação do nome
    if (nome === "" || nome.length < 3) {
        formulario.nomeProduto.focus();
        criarErro(formulario.nomeProduto, "O nome deve ter pelo menos 3 caracteres.");
        return false;
    }

    // Validação do estoque: deve ser número e não negativo
    if (estoque === "" || isNaN(estoque) || Number(estoque) < 0) {
        formulario.estoqueProduto.focus();
        criarErro(formulario.estoqueProduto, "Informe um valor numérico válido para o estoque.");
        return false;
    }

    // Validação do preço: deve ser número e maior que zero
    if (preco === "" || isNaN(preco) || Number(preco) <= 0) {
        formulario.precoProduto.focus();
        criarErro(formulario.precoProduto, "Informe um preço válido (maior que 0).");
        return false;
    }

    return true;
}

function criarErro(elemento, mensagem) {
    const erro = document.createElement('p');
    erro.className = 'erro-input';
    erro.style.color = 'red';
    erro.style.marginTop = '-10px';
    erro.style.marginBottom = '10px';
    erro.innerText = mensagem;
    elemento.insertAdjacentElement('afterend', erro);
}
</script>


