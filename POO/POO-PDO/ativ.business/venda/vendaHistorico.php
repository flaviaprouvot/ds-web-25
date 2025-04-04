<?php
include '../conexao.php';

// Monta consulta
$sql = "SELECT * FROM vendas WHERE 1";
$params = [];

$sql .= " ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute($params);

$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="imagex/png" href="../assets/img/ico.svg">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>

<div class="menu">
    <ul>
        <li><a href='../index.php' class="meumenu" title="Home">Home</a></li>
        <li><a href='../cliente.php' class="meumenu" title="Clientes">Clientes</a></li>
        <li><a href='../produto.php' class="meumenu" title="Produtos">Produtos</a></li>
        <li><a href='../venda.php' class="meumenu " title="Vendas">Vendas</a></li>
        <li><a href="vendaHistorico.php" class="meumenu meumenu-active" title="venda">Minhas vendas</a></li>
    </ul>
</div>
<br><br><br><br>
    
<?php if (empty($vendas)) : ?>
    <p>Não há vendas registradas.</p>
<?php else : ?>

    <?php foreach ($vendas as $venda) : ?>

    <div class="venda">
        <h3>Venda #<?= $venda['id'] ?> (ID Venda) - Data: <?= $venda['dataVenda'] ?></h3>

        <?php
        // Dados cliente
        $cliente = $db->prepare("SELECT nome, email FROM clientes WHERE id = :id");
        $cliente->execute([':id' => $venda['idCliente']]);
        $cliente = $cliente->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="cliente"><strong>Cliente:</strong> <?= $cliente['nome'] ?> (<?= $cliente['email'] ?>) - (ID Cliente: <?= $venda['idCliente'] ?>)</div>

        <?php

        // Produtos vendidos
        $produtosVendidos = $db->prepare("SELECT idProduto, quantidade FROM produtosVendidos WHERE idVenda = :idVenda");
        $produtosVendidos->execute([':idVenda' => $venda['id']]);
        $produtosVendidos = $produtosVendidos->fetchAll(PDO::FETCH_ASSOC);

        // Detalhes do produto
        $produtos = [];
        foreach ($produtosVendidos as $produtoVendido) {
            $stmtProduto = $db->prepare("SELECT nome, preco FROM produtos WHERE id = :idProduto");
            $stmtProduto->execute([':idProduto' => $produtoVendido['idProduto']]);
            $produtoDetalhado = $stmtProduto->fetch(PDO::FETCH_ASSOC);

            $produtos[] = [
                'idProduto' => $produtoVendido['idProduto'],
                'nome' => $produtoDetalhado['nome'],
                'preco' => $produtoDetalhado['preco'],
                'quantidade' => $produtoVendido['quantidade']
            ];
        }
        ?>

        <div class="produtos">
        <table id="vendas">
            <tr>
                <th>ID Produto</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th></tr>
            <?php
            $total = 0;
            foreach ($produtos as $produto) :
                $subtotal = $produto['preco'] * $produto['quantidade'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= $produto['idProduto'] ?></td>
                    <td><?= $produto['nome'] ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= $produto['quantidade'] ?></td>
                    <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
            <tr><td colspan="4"><strong>Total da Venda:</strong></td><td><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td></tr>
        </table>
        </div>
    </div>

    <?php endforeach; ?>

<?php endif; ?>

</body>
</html>

