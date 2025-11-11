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
        <p>Bem-Vindo ao Sistema <?=$_SESSION['usuario']['nomeUsuario'];?></p>  
    </div>

    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="principal.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
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
        <h3>Painel de Alertas</h3>
    </div>

    <div id="alertas"></div>
</div>

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

<div class="footer bg-info text-white text-center p-3 fixed-bottom">
  <p class="mb-0">Desenvolvido por Flávia Prouvot</p>
</div>

</body>
</html>