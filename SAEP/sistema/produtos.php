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
  <title>Gerenciamento de Estoque - Loja de materiais de construção</title>
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
                    <a class="nav-link active" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estoque.php">Estoque</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="api.php?acao=logout">Sair</a>
                </li>
            </ul>
        </div>
    </nav>


  <div class="container distancia-top">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Gerenciamento de Produtos</h3>
      <a href="principal.php" class="btn btn-secondary">← Voltar</a>
    </div>

    <div id="mensagem"></div>

    <div class="form-section mb-4">
      <form id="formProduto">
        <input type="hidden" id="idProduto">

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome do Produto:</label>
            <input type="text" id="nome" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Modelo:</label>
            <input type="text" id="modelo" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label class="form-label">Material:</label>
            <input type="text" id="tipoMaterial" class="form-control" rows="2" required>
          </div>
          </div>
          <div class="col-md-4">
          <label for="preco" class="form-label">Preço:</label>
          <input type="number" id="preco" class="form-control" step="0.01" min="0" placeholder="0.00" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Estoque disponível:</label>
            <input type="number" id="estoque" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Estoque mín:</label>
            <input type="number" id="estoqueMin" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Estoque máx:</label>
            <input type="number" id="estoqueMax" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Marca:</label>
            <input type="text" id="marca" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Tamanho (em cm):</label>
            <input type="number" id="tamanho" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Peso (em g):</label>
            <input type="number" id="peso" class="form-control" required>
       
          <div class="col-md-4">
            <label class="form-label">Tensão (em V):</label>
            <input type="number" id="tensao" class="form-control" required>
          </div>

        </div>

        <div class="mt-4 text-end">
          <button type="submit" class="btn btn-success">Salvar</button>
          <button type="button" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
        </div>
      </form>
    </div>

    

    <h4>Lista de Produtos</h4>
    <div class="mb-3">
      <input type="text" id="campoBusca" class="form-control" placeholder="Buscar produto pelo nome...">
    </div>
    <table class="table table-striped mt-3">
      <thead class="table-secondary">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Modelo</th>
          <th>Tipo Material</th>
          <th>Preço</th>
          <th>Estoque disponível</th>
          <th>Estoque mínimo</th>
          <th>Estoque máximo</th> 
          <th>Marca</th>
          <th>Tamanho</th>
          <th>Peso</th>
          <th>Tensão</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="tabelaProdutos"></tbody>
    </table>
  </div>

  <script>
    
      const tabela = document.getElementById('tabelaProdutos');
      const form = document.getElementById('formProduto');
      const msg = document.getElementById('mensagem');
      const campoBusca = document.getElementById('campoBusca');
      const btnLimpar = document.getElementById('btnLimpar');
      let produtos = [];

      // Carrega produtos ao iniciar
      document.addEventListener("DOMContentLoaded", carregarProdutos);


      // Carrega todos os produtos da API
      async function carregarProdutos() {
        const resp = await fetch('http://localhost/SAEP/sistema/api.php?acao=listarProdutos');
        produtos = await resp.json();
        atualizarTabela();
      }

      // Atualiza tabela conforme a busca
      function atualizarTabela() {
        const termo = campoBusca.value.toLowerCase();
        const filtrados = produtos.filter(p =>
          p.nome.toLowerCase().includes(termo)
        );

        tabela.innerHTML = '';
        filtrados.forEach(p => {
  
          tabela.innerHTML += `
            <tr>
              <td>${p.idProduto}</td>
              <td>${p.nome}</td>
              <td>${p.modelo}</td>
              <td>${p.tipoMaterial}</td>
              <td>R$ ${parseFloat(p.preco).toFixed(2)}</td>
              <td>${p.estoque}</td>
              <td>${p.estoqueMin}</td>
              <td>${p.estoqueMax}</td>
              <td>${p.marca}</td>
              <td>${p.tamanho}</td>
              <td>${p.peso}</td>
              <td>${p.tensao}</td>
              <td>
                <button class="btn btn-sm btn-primary me-2" onclick="editar(${p.idProduto})">Editar</button>
                <button class="btn btn-sm btn-danger" onclick="excluir(${p.idProduto})">Excluir</button>
              </td>
            </tr>
          `;
        });
      }
  
    // Busca dinâmica
    campoBusca.addEventListener('input', atualizarTabela);

    // Cadastrar ou editar produto
    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const produto = {
        idProduto: document.getElementById('idProduto').value,
        nome: document.getElementById('nome').value,
        modelo: document.getElementById('modelo').value,
        tipoMaterial: document.getElementById('tipoMaterial').value, 
        preco: document.getElementById('preco').value,
        estoque: document.getElementById('estoque').value,
        estoqueMin: document.getElementById('estoqueMin').value,
        estoqueMax: document.getElementById('estoqueMax').value,
        marca: document.getElementById('marca').value,
        tamanho: document.getElementById('tamanho').value,
        peso: document.getElementById('peso').value,
        tensao: document.getElementById('tensao').value,
      };

      const acao = produto.idProduto ? 'editarProduto' : 'inserirProduto';

      const resp = await fetch(`http://localhost/SAEP/sistema/api.php?acao=${acao}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(produto)
      });

      const dados = await resp.json();
      msg.innerHTML = `<div class="alert alert-info">${dados.mensagem || dados.erro}</div>`;

      form.reset();
      document.getElementById('idProduto').value = '';
      carregarProdutos();
    });

    function editar(id) {
      const p = produtos.find(x => x.idProduto == id);
      if(!p) return;
      document.getElementById('idProduto').value = p.idProduto;
      document.getElementById('nome').value = p.nome;
      document.getElementById('modelo').value = p.modelo;
      document.getElementById('tipoMaterial').value = p.tipoMaterial;
      document.getElementById('preco').value = p.preco;
      document.getElementById('estoque').value = p.estoque;
      document.getElementById('estoqueMin').value = p.estoqueMin;
      document.getElementById('estoqueMax').value = p.estoqueMax;
      document.getElementById('marca').value = p.marca;
      document.getElementById('tamanho').value = p.tamanho;
      document.getElementById('peso').value = p.peso;
      document.getElementById('tensao').value = p.tensao;
    }

    // Excluir produto
    async function excluir(idProduto) {
      if (!confirm("Tem certeza que deseja excluir este produto?")) return;

      const resp = await fetch('http://localhost/SAEP/sistema/api.php?acao=excluirProduto', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ idProduto })
      });

      const dados = await resp.json();
      msg.innerHTML = `<div class="alert alert-warning">${dados.mensagem || dados.erro}</div>`;
      carregarProdutos();
    }

    // Cancelar edição
    btnCancelar.addEventListener('click', () => {
      form.reset();
      document.getElementById('idProduto').value = '';
    });

    
  </script>
</body>
</html>