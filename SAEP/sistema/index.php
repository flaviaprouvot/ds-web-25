<?php
/*
    session_start();
    if(isset($_SESSION['login']) and isset($_SESSION['senha'])){
        header('Location: dashboard.php');
    }
    if(isset($_SESSION['erro'])){
        echo '<p style="color:red">'.$_SESSION['erro'].'</p><br>';
        session_unset($_SESSION['erro']);
    }
*/
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

    <div class="container my-5 mx-auto p-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <h3 class="text-center mb-4">Login</h3>
                <form action="api.php?acao=login" method="POST" id="formLogin">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="login" name="login" id="login" class="form-control" placeholder="Digite seu login" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-info w-100">Entrar</button>
                </form>

                <div id="mensagem" class="mt-3 text-center "></div>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 bg-info text-dark text-center">
        <p>Desenvolvido por Flávia Prouvot.</p>
    </div>

    <script>
        const form = document.getElementById('formLogin');
        const msg = document.getElementById('mensagem');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            msg.innerHTML = '';

            const loginUsuario = document.getElementById('login').value;
            const senhaUsuario = document.getElementById('senha').value;

            const resposta = await fetch('http://localhost/SAEP/sistema/api.php?acao=login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ loginUsuario, senhaUsuario })
            });

            const dados = await resposta.json();

            if (dados.mensagem) {
                msg.innerHTML = `<div class="alert alert-success">${dados.mensagem}</div>`;
                setTimeout(() => window.location.href = 'principal.php', 1000);
            } else {
                msg.innerHTML = `<div class="alert alert-danger">${dados.erro}</div>`;
            }
        });
    </script>
 <body class="d-flex flex-column min-vh-100">
  <main class="flex-fill">
    <!-- Conteúdo da página -->
  </main>

</body>
</html>