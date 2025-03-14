<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu">
    <ul>
        <li><a href="#" class="meumenu meumenu-active" title="Home">Home</a></li>
        <li><a href="cliente.php" class="meumenu" title="Clientes">Clientes </a></li>
        <li><a href="#" class="meumenu" title="Produtos">Produtos </a></li>
        <li><a href="#" class="meumenu" title="Vendas">Vendas </a></li>
    </ul>
    </div>

    <div class="container">
        <hr>

<h1>Dashboard</h1>
<p>A dashboard encontra-se em desenvolvimento, os dados processados até o momento são:</p>
<?php 
        include 'conexao.php';
        $dados = $db->query("SELECT * FROM clientes");
        echo "Quantidade de clientes cadastrados: " .$dados->rowCount();
?>
    </div>
  
       
    
</body>
<script src="script.js"></script>
</html>



