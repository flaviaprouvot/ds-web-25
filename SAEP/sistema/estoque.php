<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gerenciamento de Estoque</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
<body>


    <div class="p-5 bg-info text-white text-center">
        <h1>Gerenciamento de Estoque</h1>
        <p>Sistema de Gerenciamento de Estoque.</p>  
    </div>

    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="principal.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="estoque.php">Estoque</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="api.php?acao=logout">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container distancia-top">
      <div id="alertas"></div>
    

        <script>
        async function verificarEstoque() {
            const resp = await fetch('http://localhost/SAEP/sistema/api.php?acao=listarProdutos');
            const produtos = await resp.json();

            const alertasDiv = document.getElementById('alertas');
            alertasDiv.innerHTML = '';

            produtos.forEach(p => {
                if (p.estoque < p.estoqueMin) {
                    alertasDiv.innerHTML += `
                        <div class="alert alert-danger">
                            ⚠️ Produto <b>${p.nome}</b> está com o estoque abaixo do mínimo (${p.estoque}).
                        </div>`;
                }
            });

            if (alertasDiv.innerHTML === '') {
                alertasDiv.innerHTML = `
                    <div class="alert alert-success">
                        ✅ Todos os produtos estão dentro do nível de estoque ideal.
                    </div>`;
            }
        }


            verificarEstoque();
            </script>
      </div>
    </div>

    
  <div class="container distancia-top">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Controle de Estoque</h3>
      <a href="principal.php" class="btn btn-secondary">← Voltar</a>
    </div>

    <div id="mensagem"></div>

    <div class="form-section mb-4">
      <form id="formEstoque">
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Produto</label>
            <select id="fkProd" class="form-select" required></select>
          </div>

          <div class="col-md-2">
            <label class="form-label">Tipo de Movimento</label>
            <select id="tipoMovimento" class="form-select" required>
              <option value="">Selecione</option>
              <option value="E">Entrada (+)</option>
              <option value="S">Saída (-)</option>
            </select>
          </div>

          <div class="col-md-2">
            <label class="form-label">Quantidade</label>
            <input type="number" id="quantidade" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Data do Movimento</label>
            <input type="datetime-local" id="dataMovimento" class="form-control">
          </div>
        </div>

        <div class="mt-4 text-end">
          <button type="submit" class="btn btn-success">Lançar Movimento</button>
        </div>
      </form>
    </div>

    <h4>Histórico de Movimentos</h4>
    <table class="table table-striped mt-3">
      <thead class="table-secondary">
        <tr>
          <th>ID</th>
          <th>Tipo</th>
          <th>Quantidade</th>
          <th>Usuário</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody id="tabelaHistorico"></tbody>
    </table>
  </div>

  <script>
    const selectProd = document.getElementById('fkProd');
    const form = document.getElementById('formEstoque');
    const msg = document.getElementById('mensagem');
    const tabela = document.getElementById('tabelaHistorico');

    // Carrega lista de produtos
    async function carregarProdutos() {
      const resp = await fetch('http://localhost/SAEP/sistema/api.php?acao=listarProdutos');
      const produtos = await resp.json();
      selectProd.innerHTML = '<option value="">Selecione...</option>';
      produtos.forEach(p => {
        selectProd.innerHTML += `<option value="${p.idProduto}">${p.nome}</option>`;
      });
    }

    // Carrega histórico de um produto
    async function carregarHistorico() {
      const fkProd = selectProd.value;
      if (!fkProd) {
        tabela.innerHTML = '';
        return;
      }

      const resp = await fetch(`http://localhost/SAEP/sistema/api.php?acao=historicoEstoque&fkProd=${fkProd}`);
      const movimentos = await resp.json();

      tabela.innerHTML = '';
      movimentos.forEach(m => {
        const tipo = m.tipoMovimento === 'E' ? 'Entrada (+)' : 'Saída (-)';
        const classe = m.tipoMovimento === 'E' ? 'text-success' : 'text-danger';
        tabela.innerHTML += `
          <tr>
            <td>${m.idEstoque}</td>
            <td class="${classe}">${tipo}</td>
            <td>${m.quantidade}</td>
            <td>${m.nomeUsuario}</td>
            <td>${new Date(m.dataMovimento).toLocaleString('pt-BR')}</td>
          </tr>
        `;
      });
    }

    // Quando selecionar produto, carrega histórico
    selectProd.addEventListener('change', carregarHistorico);

    // Lançar movimento de estoque
    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const movimento = {
        fkProd: selectProd.value,
        tipoMovimento: document.getElementById('tipoMovimento').value,
        quantidade: document.getElementById('quantidade').value,
        dataMovimento: document.getElementById('dataMovimento').value
          ? new Date(document.getElementById('dataMovimento').value).toISOString().slice(0, 19).replace('T', ' ')
          : null
      };

      const resp = await fetch('http://localhost/SAEP/sistema/api.php?acao=lancarEstoque', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(movimento)
      });

      const dados = await resp.json();
      msg.innerHTML = `<div class="alert alert-info">${dados.mensagem || dados.erro}</div>`;
      form.reset();
      carregarHistorico();
    });

    carregarProdutos();
  </script>
</body>
</html>