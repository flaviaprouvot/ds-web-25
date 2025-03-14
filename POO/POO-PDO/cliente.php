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
        <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
        <li><a href="cliente.php" class="meumenu meumenu-active" title="Clientes">Clientes </a></li>
        <li><a href="#" class="meumenu" title="Produtos">Produtos </a></li>
        <li><a href="#" class="meumenu" title="Vendas">Vendas </a></li>
    </ul>
    </div>

    <div class="container">
        <hr>
        <div class="formulario">
            <form action="insertion.php" method="POST" name = "formulario" onsubmit=" return validarDadosCliente()">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
                <br>
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email">
                <br>
                <label for="observacao">Observação do cliente:</label>
                <textarea name="observacao" cols="30" rows="4" id="observacao" ></textarea>
                <br>
                <input type="submit">    
            </form>
        </div>

<table id="clientes">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Observação</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

<?php 
        include 'conexao.php';

        echo "<h2>Consulta com muitas linhas:</h2>";
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC);

        foreach($todos as $linha)
        {
            $idCliente= $linha['id'];
            $nomeCliente=$linha['nome'];
            $emailCliente=$linha['email'];
            $observacaoCliente=$linha['observacao'];

            echo"
                <tr>
                    <td>$nomeCliente</td>
                    <td>$emailCliente</td>
                    <td>$observacaoCliente</td>
                    <td><a href= 'delete.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></a></td>
                    <td><a href= 'delete.php?id=$idCliente'><i class='fa-solid fa-trash-can'></i></a></td>
                </tr>
            ";

        }

?>
</table>

        <h3><a href="#">Link de teste</a></h3>
    </div>
  
       
    
</body>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/d227ee8806.js" crossorigin="anonymous"></script>
</html>



